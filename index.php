 <?php include 'header.php'; ?>
    <link rel="stylesheet" href="index.css">

    <div class="contenedor">
      <h2>Denboraldiko bideojokoak</h2>

      <script>
      $(document).ready(function(){
      $('.single-item').slick({
      autoplay: true,
      autoplaySpeed:5000,
      speed: 600,
      arrows: false,
      dots: true
      });
      });
      </script>

      <div class="single-item">
        <a href="jokuespezifikoa.php">
      <div><img src="irudiak/Minecraft.jpg"></div>
        </a>
        <a href="jokuespezifikoa.php">
      <div><img src="irudiak/Hollow.jpg"></div>
        </a>
        <a href="jokuespezifikoa.php">
      <div><img src="irudiak/Island.jpg"></div>
        </a>
      </div>

      <div class="tarjetas">
        <h2>Zer egin dezakezu?</h2>
        <div class="karta">
          <h3>Deskubritu:</h3>
          <p>Joku berriak eta beraien informazioa.</p>
        </div>

        <div class="karta">
          <h3>Iruzkin:</h3>
          <p>Zure iritziak denok ikusteko.</p>
        </div>

        <div class="karta">
          <h3>Baloratu:</h3>
          <p>Jokuak beraien izarrak aldatzeko.</p>
        </div>
      </div>
    </div>

     <?php include 'footer.php'; ?>
    
  </body>
</html>
