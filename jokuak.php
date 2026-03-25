 <?php include 'header.php'; ?>
 <link rel="stylesheet" href="jokuak.css">
<div class="game-list">

    <div class="game-card">
        <a href="jokuespezifikoa.php?juego=Minecraft">
            <img src="irudiak/Minecraft.jpg" alt="Minecraft">
            <p><?= $text['game_minecraft'] ?></p>
            <div class="stars">★★★★★</div>
        </a>
    </div>

    <div class="game-card">
        <a href="jokuespezifikoa.php?juego=HollowKnight">
            <img src="irudiak/Hollow.jpg" alt="Hollow Knight">
            <p><?= $text['game_hollow'] ?></p>
            <div class="stars">★★★★★</div>
        </a>
    </div>

    <div class="game-card">
        <a href="jokuespezifikoa.php?juego=DeadIsland2">
            <img src="irudiak/Island.jpg" alt="Dead Island 2">
            <p><?= $text['game_deadisland'] ?></p>
            <div class="stars">★★★★★</div>
        </a>
    </div>

    <div class="game-card">
        <a href="jokuespezifikoa.php?juego=Valorant">
            <img src="irudiak/Valorant.jpg" alt="Valorant">
            <p><?= $text['game_valorant'] ?></p>
            <div class="stars">★★★★★</div>
        </a>
    </div>

    <div class="game-card">
        <a href="jokuespezifikoa.php?juego=LeagueOfLegends">
            <img src="irudiak/lol.jpeg" alt="League of Legends">
            <p><?= $text['game_lol'] ?></p>
            <div class="stars">★★★★★</div>
        </a>
    </div>

    <div class="game-card">
        <a href="jokuespezifikoa.php?juego=Mewgenics">
            <img src="irudiak/mewgenics.jpg" alt="Mewgenics">
            <p><?= $text['game_mewgenics'] ?></p>
            <div class="stars">★★★★★</div>
        </a>
    </div>

</div>
</div>
 <?php include 'footer.php'; ?>
</body>
</html>