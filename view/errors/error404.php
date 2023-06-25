<?php require 'view/parts/header.php'; ?>
<div class="container">

    <div class="centered">
        <button onclick="window.history.back()" class="btn btn-primary">Revenir en arrière</button>
        <div class="text-center">
            <h1>ERROR 404 ! :(</h1>
            <br>
            <?php
            $picturesNumber = 3;
            $pictureName[1] = "error404_01.gif";
            $pictureName[2] = "error404_02.gif";
            $pictureName[3] = "error404_03.gif";

            srand((float)microtime() * 1000000);
            $pictureAff = rand(1, $picturesNumber);
            ?>

            <img src="./public/img_404/<?php echo $pictureName[$pictureAff]; ?>" width="350" alt="Image aléatoire">
            <br>
            <br>
            <?php
            if ($_GET["scope"] == 'moto') {
                echo ('<h2>Cette moto n\'existe plus !</h2>');
            }
            ?>


        </div>
    </div>



</div>
<?php require 'view/parts/footer.php'; ?>