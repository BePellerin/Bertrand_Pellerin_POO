<div class="container">
    <?php require 'view/parts/header.php'; ?>
    <h1>Se connecter</h1>

    <form method="POST">
        <div class="col-md-12">
            <label for="username">Login *</label>
            <input id="username" type="text" name="username" class="form-control
                    <?php if (array_key_exists('username', $errors)) {
                        echo ('is-invalid');
                    } ?>" value="<?php if (array_key_exists("username", $_POST)) {
                                        echo ($_POST["username"]);
                                    } ?>">

            <div class="invalid-feedback">
                <?php if (array_key_exists("username", $errors)) {
                    echo ($errors["username"]);
                } ?>
            </div>
        </div>



        <div class="col-md-12">
            <label for="password">Mot de passe *</label>
            <input id="password" type="password" name="password" class="form-control  <?php if (array_key_exists('password', $errors)) {
                                                                                            echo ('is-invalid');
                                                                                        } ?>">
            <div class="invalid-feedback">
                <?php if (array_key_exists("password", $errors)) {
                    echo ($errors["password"]);
                } ?>
            </div>
        </div>


        <input type="submit" class="btn btn-success m-2">

    </form>
<br>
<br>

</div>
<?php require 'view/parts/footer.php'; ?>