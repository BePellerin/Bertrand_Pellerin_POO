<title>Liste des motos disponibles</title>

<style>
    .moto-image {
        max-height: 75px;
    }
    
</style>

<?php require 'view/parts/header.php'; ?>

<body>
    <div class="container">


        <h1>Liste des motos disponibles</h1>

        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <a class="btn btn-primary" href="index.php?controller=default&action=homepage">Revenir en arrière</a>
                <a class="btn btn-success" href="index.php?controller=moto&action=add">Ajouter une moto</a>
                <br>
                <br>
                <form method="GET">
                    <div class="form-group">
                        <label for="typeChoice">Choix par type :</label>
                        <select class="form-control" id="typeChoice" name="controller=moto&action=list&type">
                            <option>Enduro</option>
                            <option>Custom</option>
                            <option>Sportive</option>
                            <option>Roadster</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Modèle</th>
                    <th scope="col">Type</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($motos as $moto) { ?>
                    <tr>
                        <th scope="row"><?php echo $moto->getId(); ?></th>
                        <td><?php echo $moto->getMarque(); ?></td>
                        <td><?php echo $moto->getModele(); ?></td>
                        <td><?php echo $moto->getType(); ?></td>
                        <td><img class="moto-image" src="public/img/<?php echo $moto->getPicture(); ?>" alt="moto"></td>
                        <td>
                            <a href="index.php?controller=moto&action=detail&id=<?php echo $moto->getId(); ?>" class="btn btn-primary">Détails de la <?php echo $moto->getModele(); ?></a>
                            <a href="index.php?controller=moto&action=delete&id=<?php echo $moto->getId(); ?>" class="btn btn-danger">Supprimer cette moto</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

    <?php require 'view/parts/footer.php'; ?>