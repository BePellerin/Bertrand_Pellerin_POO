<?php
require 'autoload.php';
// setcookie("nom_du_cookie", "valeur_du_cookie", time() + 3600, "/");
if (
    !array_key_exists("controller", $_GET) &&
    !array_key_exists("action", $_GET)
    // && !array_key_exists("type", $_GET)
) {
    header('Location: index.php?controller=default&action=homepage');
}



if ($_GET["controller"] == 'default') {
    $controller = new DefaultController();

    if ($_GET["action"] == "homepage") {
        $controller->homepage();
    }
    if ($_GET["action"] == 'not-found') {
        $controller->notFound();
    }
}

if ($_GET["controller"] == 'moto') {
    $controller = new MotoController();
    if ($_GET["action"] == 'list') {
        // if (array_key_exists('type', $_GET)) {
        //         if ($_GET["type"] == 'Enduro') {
        //             $controller->enduroOnly($type);}}
        //     } elseif ($_GET["type"] == 'Custom') {
        //         $controller->customOnly();
        //     } elseif ($_GET["type"] == 'Sportive') {
        //         $controller->sportiveOnly();
        //     } elseif ($_GET["type"] == 'Roadster') {
        //         $controller->roadsterOnly();
        //     }
        $controller->displayAll();
    }
    if ($_GET['action'] == 'detail' && array_key_exists('id', $_GET)) {
        $controller->displayOne($_GET["id"]);
    }
    if ($_GET["action"] == 'add') {
        $controller->add();
    }
    if ($_GET["action"] == "delete" && array_key_exists("id", $_GET)) {
        $controller->delete($_GET["id"]);
    }
}
if ($_GET["controller"] == 'security') {
    $controller = new SecurityController();
    if ($_GET["action"] == 'login') {
        $controller->login();
    }
    if ($_GET["action"] == 'logout') {
        $controller->logout();
    }
}
