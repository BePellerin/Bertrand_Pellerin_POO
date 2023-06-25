<?php require 'view/parts/header.php'; ?>
<div class="container">

    <h1>Ajouter une moto</h1>

    <a href="index.php?controller=moto&action=list" class="btn btn-primary mt-3">Retour à la liste des motos</a>

    <form method="POST" enctype="multipart/form-data" class="row">
        <div class="col-md-12">
            <label for="marque" class="form-label">Marque</label>
            <input type="text" value="<?php if (array_key_exists("marque", $_POST)) {
                                            echo ($_POST["marque"]);
                                        }; ?>" name="marque" class="form-control
            <?php if (array_key_exists("marque", $errors)) {
                echo ('is-invalid');
            } ?>" id="marque">

            <div id="validateMarque" class="invalid-feedback">
                <?php if (array_key_exists("marque", $errors)) {
                    echo ($errors["marque"]);
                } ?>
            </div>
        </div>

        <div class="col-md-12">
            <label for="modele" class="form-label">Modèle</label>
            <input type="text" value="<?php if (array_key_exists("modele", $_POST)) {
                                            echo ($_POST["modele"]);
                                        }; ?>" name="modele" class="form-control
            <?php if (array_key_exists("modele", $errors)) {
                echo ('is-invalid');
            } ?>" id="modele">

            <div id="validateModele" class="invalid-feedback">
                <?php if (array_key_exists("modele", $errors)) {
                    echo ($errors["modele"]);
                } ?>
            </div>
        </div>


        <div class="col-md-12">
            <label for="validationCustom04" class="form-label">Choix du type</label>
            <select class="form-select
                 <?php if (array_key_exists("type", $errors)) {
                        echo ('is-invalid');
                    } ?>" name="type" id="validationCustom04">

                <?php
                foreach (MotoController::$allowedType as $type) {
                    $selected = '';
                    if (array_key_exists("type", $_POST) && $_POST["type"] == $type) {
                        $selected = 'selected';
                    }
                    echo ('<option ' . $selected . ' value="' . $type . '">' . $type . '</option>');
                }
                ?>
            </select>
            <div class="invalid-feedback">
                <?php if (array_key_exists("type", $errors)) {
                    echo ($errors["type"]);
                } ?>
            </div>
        </div>

        <div class="col-md-12">
            <label for="picture" class="form-label">Photo</label>
            <input type="file" name="picture" class="form-control
            <?php if (array_key_exists("picture", $errors)) {
                echo ('is-invalid');
            } ?>" id="picture">
            <div class="invalid-feedback">
                <?php if (array_key_exists("picture", $errors)) {
                    echo ($errors["picture"]);
                } ?>
            </div>
        </div>
        <div>
            <div class="col-md-6"></div>
            <br>
            <input type="submit" class="btn btn-success col-md-6 ml-auto">

        </div>

    </form>

</div>


<?php require 'view/parts/footer.php'; ?>