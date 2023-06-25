<title>Détails de la <?php echo $moto->getMarque() . " " . $moto->getModele(); ?></title>

<style>
    .moto-image {
        height: 500px;
    }

    .centered {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
</style>
<?php require 'View/parts/header.php'; ?>
<div class="container">

    <a href="index.php?controller=moto&action=list" class="btn btn-primary mt-3">Retour à la liste des motos</a>
    <div class="centered">
        <div class="text-center">


            <h1 class="mt-3">Détails de la <?php echo $moto->getMarque() . " " . $moto->getModele(); ?>.</h1>

            <img class="moto-image mt-3" src="public/img/<?php echo $moto->getPicture(); ?>" alt="moto">

            <h2 class="mt-3">Les infos :</h2>
            <ul>
                <p>Type = <?php echo $moto->getType(); ?></p>
            </ul>
        </div>
    </div>
</div>

<?php require 'View/parts/footer.php'; ?>