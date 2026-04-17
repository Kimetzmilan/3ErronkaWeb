<?php 
include 'header.php'; 
require 'konexioa.php';

if (isset($_GET['juego'])) {
    $juego = $_GET['juego'];
    $_SESSION['juego'] = $juego;
} elseif (isset($_SESSION['juego'])) {
    $juego = $_SESSION['juego'];
} else {
    header("Location: index.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM bideojokoak WHERE izena = ?");
$stmt->bind_param("s", $juego);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<h2>Juego no encontrado</h2>";
    include 'footer.php';
    exit;
}

$game = $result->fetch_assoc();

$config = simplexml_load_file("daymode.xml");
$idioma = (string)$config->hizkuntza;
include 'lang.php';
$text = $lang[$idioma];

$labelNombre = $text['juego_nombre'] ?? 'Nombre';

$uid = $_SESSION['id'] ?? null;
$gid = $game['id'];

$mediaStars = 0;
$userStars = 0;

$avgStmt = $conn->prepare("SELECT AVG(puntuazioa) AS media FROM balorazioak WHERE bideojoko_id = ?");
$avgStmt->bind_param("i", $gid);
$avgStmt->execute();
$avgRes = $avgStmt->get_result();
if ($avgRes && $avgRow = $avgRes->fetch_assoc()) {
    $media10 = $avgRow['media'] ? round($avgRow['media']) : 0;
    $mediaStars = round($media10 / 2);
}

if ($uid) {
    $userStmt = $conn->prepare("SELECT puntuazioa FROM balorazioak WHERE erabiltzaile_id = ? AND bideojoko_id = ?");
    $userStmt->bind_param("ii", $uid, $gid);
    $userStmt->execute();
    $userRes = $userStmt->get_result();
    if ($userRes && $userRow = $userRes->fetch_assoc()) {
        $userRate10 = (int)$userRow['puntuazioa'];
        $userStars = round($userRate10 / 2);
    }
}

if ($uid && isset($_POST['nuevo_comentario'])) {
    $coment = trim($_POST['nuevo_comentario']);
    if ($coment !== "") {
        $ins = $conn->prepare("INSERT INTO iritziak (erabiltzaile_id, bideojoko_id, iritzia) VALUES (?, ?, ?)");
        $ins->bind_param("iis", $uid, $gid, $coment);
        $ins->execute();
    }
    header("Location: jokuespezifikoa.php?juego=" . urlencode($juego));
    exit;
}

$comentarios = $conn->query("
    SELECT 
        i.*, 
        u.izena, 
        u.blokeoa, 
        i.erabiltzaile_id,
        (SELECT puntuazioa FROM balorazioak 
         WHERE erabiltzaile_id = i.erabiltzaile_id 
         AND bideojoko_id = $gid LIMIT 1) AS puntu_user
    FROM iritziak i 
    JOIN erabiltzaileak u ON u.id = i.erabiltzaile_id
    WHERE bideojoko_id = $gid 
    AND ikusgai = 1
    AND u.blokeoa = 0
    ORDER BY id DESC
");
?>

<link rel="stylesheet" href="jokuespezifikoa.css">
<br>

<main>

    <div>
        <img class="img2" src="irudiak/<?= htmlspecialchars($game['irudia']) ?>" 
             alt="<?= htmlspecialchars($game['izena']) ?>">
    </div>

    <br>

    <section class="game-info">
        <h2><?= $text['juego_info'] ?></h2>

        <p><strong><?= $labelNombre ?>:</strong> <?= htmlspecialchars($game['izena']) ?></p>

        <p><strong><?= $text['juego_genero'] ?>:</strong> <?= htmlspecialchars($game['generoa']) ?></p>

        <p>
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <?= $i <= $mediaStars ? "★" : "☆" ?>
        <?php endfor; ?>
        </p>
    </section>

    <section class="extra">
        <h2><?= $text['juego_extra'] ?></h2>

        <p><strong><?= $text['juego_requisitos'] ?>:</strong> CPU, RAM, GPU...</p>

        <p><strong><?= $text['juego_fecha'] ?>:</strong> 
            <?= htmlspecialchars($game['argitaratze_data']) ?>
        </p>

        <p><strong><?= $text['juego_precio'] ?>:</strong> <?= htmlspecialchars($game['prezioa']) ?> €</p>

        <p><strong><?= $text['juego_proveedor'] ?>:</strong> <?= htmlspecialchars($game['sortzailea']) ?></p>
    </section>

    <?php if ($uid): ?>
    <section class="comentarios">
        <h2><?= $text['chat_titulo'] ?></h2>

        <form method="POST" class="form-chat">
            <textarea name="nuevo_comentario" placeholder="<?= $text['chat_placeholder'] ?>" required></textarea>
            <button type="submit"><?= $text['chat_enviar'] ?></button>
        </form>

        <div class="chat-window">
        <?php while ($c = $comentarios->fetch_assoc()): ?>
            <?php 
                $es_mio = ($c['erabiltzaile_id'] == $uid);
                $clase = $es_mio ? "msg msg-mio" : "msg msg-otro";
                $puntu = (int)$c['puntu_user'];
                $stars = round($puntu / 2);
            ?>
            <div class="<?= $clase ?>">
                <p class="nombre"><?= htmlspecialchars($c['izena']) ?></p>

                <?php if ($puntu > 0): ?>
                <p class="valoracion">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <?= $i <= $stars ? "★" : "☆" ?>
                    <?php endfor; ?>
                </p>
                <?php endif; ?>

                <p class="texto"><?= nl2br(htmlspecialchars($c['iritzia'])) ?></p>
            </div>
        <?php endwhile; ?>
        </div>

    </section>
    <?php endif; ?>

</main>

<?php include 'footer.php'; ?>