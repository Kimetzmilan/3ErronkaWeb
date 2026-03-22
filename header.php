<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="header.css">
    <title>index</title>
  </head>

  <?php
$xml = simplexml_load_file("daymode.xml");
$daymode = (string)$xml->daymode;
?>
<body class="<?= $daymode ?>">
    
<header>
    <div>
        <img class="img" src="irudiak/SteelWave.png" alt="">
    </div>
    <nav>
      <?php
      if (isset($_POST["toggle_lang"])) {

      $xmlLang = simplexml_load_file("daymode.xml");

      if ((string)$xmlLang->hizkuntza === "es") {
          $xmlLang->hizkuntza = "eu";
      } else {
          $xmlLang->hizkuntza = "es";
      }

     $xmlLang->asXML("daymode.xml");

     header("Location: " . $_SERVER["PHP_SELF"]);
     exit;
     }

     $xmlLang = simplexml_load_file("daymode.xml");
     $hizkuntza = (string)$xmlLang->hizkuntza;

     if ($hizkuntza === "es") {
       $iconLang = "🇪🇸";
     } else {
       $iconLang = "🇪🇺";
     }
?>

      <?php
      if (isset($_POST["toggle"])) {

      $xml = simplexml_load_file("daymode.xml");

       if ((string)$xml->daymode === "gaua") {
       $xml->daymode = "eguna";
       } else {
       $xml->daymode = "gaua";
       }

        $xml->asXML("daymode.xml");

        header("Location: " . $_SERVER["PHP_SELF"]);
        exit;
        }

        $xml = simplexml_load_file("daymode.xml");
        $daymode = (string)$xml->daymode;

        if ($daymode === "gaua") {
        $icon = "🌙";
        } else {
        $icon = "☀️";
        }
        ?>
        <form method="post">
         <button type="submit" name="toggle_lang" class="icon-btn">
         <span class="icon"><?= $iconLang ?></span>
         </button>
        </form>
        <form method="post">
        <button type="submit" name="toggle" class="icon-btn">
        <span class="icon"><?= $icon ?></span>
        </button>
        </form>

        <a href="jokuak.php">Jokuak</a>
        <a href="login.php">Kontua</a>
        <a href="informazioa.php">Informazioa</a>


        


        <a href="index.php">Index</a>

    </nav>
</header>