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
      <div><img src="irudiak/Minecraft.jpg"></div>
      <div><img src="irudiak/Hollow.jpg"></div>
      <div><img src="irudiak/Island.jpg"></div>
      </div>

      <div class="tarjetas">
        <div class="karta">
          <h3>Tafeafa 1</h3>
          <p>ajfaejnfojea.</p>
        </div>

        <div class="karta">
          <h3>ahtdh 2</h3>
          <p>ajfaejnfojea.</p>
        </div>

        <div class="karta">
          <h3>rshsgrsg 3</h3>
          <p>ajfaejnfojea.</p>
        </div>
      </div>
    </div>

     <?php include 'footer.php'; ?>
    
  </body>
</html>
