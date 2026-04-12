<?php
include 'header.php';
require 'konexioa.php';

if (!empty($_POST['rate']) && !empty($_POST['juego_id']) && !empty($_SESSION['id'])) {

    $erabiltzaile_id = (int)$_SESSION['id'];
    $bideojoko_id = (int)$_POST['juego_id'];
    $puntuazioa = (int)$_POST['rate'];

    $check = $conn->prepare("SELECT puntuazioa FROM balorazioak 
                             WHERE erabiltzaile_id = ? AND bideojoko_id = ?");
    $check->bind_param("ii", $erabiltzaile_id, $bideojoko_id);
    $check->execute();
    $res = $check->get_result();

    if ($res && $res->num_rows > 0) {
        $upd = $conn->prepare("UPDATE balorazioak 
                               SET puntuazioa = ? 
                               WHERE erabiltzaile_id = ? AND bideojoko_id = ?");
        $upd->bind_param("iii", $puntuazioa, $erabiltzaile_id, $bideojoko_id);
        $upd->execute();
    } else {
        $ins = $conn->prepare("INSERT INTO balorazioak 
                               (erabiltzaile_id, bideojoko_id, puntuazioa) 
                               VALUES (?, ?, ?)");
        $ins->bind_param("iii", $erabiltzaile_id, $bideojoko_id, $puntuazioa);
        $ins->execute();
    }
}

$games = $conn->query("SELECT id, izena, irudia FROM bideojokoak");
?>

<link rel="stylesheet" href="jokuak.css">

<div class="game-list">

<?php
if ($games && $games->num_rows > 0) {
    while ($row = $games->fetch_assoc()) {

        $gid = (int)$row['id'];

        $avgQuery = $conn->query("SELECT AVG(puntuazioa) AS media 
                                  FROM balorazioak 
                                  WHERE bideojoko_id = $gid");
        $mediaRow = $avgQuery->fetch_assoc();
        $media10 = $mediaRow['media'] ? round($mediaRow['media']) : 0;

        $userRate10 = 0;
        if (!empty($_SESSION['id'])) {
            $uid = (int)$_SESSION['id'];
            $ur = $conn->prepare("SELECT puntuazioa FROM balorazioak 
                                  WHERE erabiltzaile_id = ? AND bideojoko_id = ?");
            $ur->bind_param("ii", $uid, $gid);
            $ur->execute();
            $rUser = $ur->get_result();
            if ($rUser && $rUser->num_rows > 0) {
                $userRate10 = (int)$rUser->fetch_assoc()['puntuazioa'];
            }
        }

        $userStars = round($userRate10 / 2);
        $mediaStars = round($media10 / 2);
        ?>

        <div class="game-card">

            <a href="jokuespezifikoa.php?juego=<?= htmlspecialchars($row['izena']) ?>">
                <img src="irudiak/<?= htmlspecialchars($row['irudia']) ?>" 
                     alt="<?= htmlspecialchars($row['izena']) ?>">
                <p><?= htmlspecialchars($row['izena']) ?></p>
            </a>

            <div class="stars">
                <form method="POST" action="jokuak.php">
                    <input type="hidden" name="juego_id" value="<?= $gid ?>">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <button type="submit" 
                                name="rate" 
                                value="<?= $i * 2 ?>" 
                                class="star-btn">
                            <?= $i <= $userStars ? "★" : "☆" ?>
                        </button>
                    <?php endfor; ?>
                </form>
            </div>

            <div class="avg-stars">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <?= $i <= $mediaStars ? "★" : "☆" ?>
                <?php endfor; ?>
            </div>

        </div>

        <?php
    }
}
?>

</div>

<?php include 'footer.php'; ?>