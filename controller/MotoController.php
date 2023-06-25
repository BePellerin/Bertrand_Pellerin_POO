<?php
class MotoController extends SecurityController
{
    private $mc;

    public static $allowedType = [
        "Enduro",
        "Custom",
        "Sportive",
        "Roadster"
    ];
    public static $allowedPicture = [
        "image/jpeg",
        "image/png"
    ];
    public function __construct()
    {
        parent::__construct();
        parent::isLoggedIn();
        $this->mc = new MotoManager();
    }

    public function displayAll()
    {

        $motos = $this->mc->getAll();
        require 'view/moto/list.php';
    }



    public function displayOne($id)
    {
        $moto = $this->mc->getOne($id);

        if (is_null($moto)) {
            header("Location: index.php?controller=default&action=not-found&scope=moto");
        }

        require 'view/moto/detail.php';
    }



    public function add()
    {

        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $errors = $this->checkForm();

            if (count($errors) == 0) {

                $uniqFileName = null;

                if (!in_array($_FILES["picture"]["type"], self::$allowedPicture)) {
                    $errors["picture"] = "Le seuls formats autorisés dont .jpeg et .png";
                }
                if ($_FILES["picture"]["error"] != 0) {
                    $errors["picture"] = 'Erreur de l\'upload';
                }
                if ($_FILES["picture"]["size"] > 2500000) {
                    $errors["picture"] = "Le fichier doit faire moins de 2,5mo";
                }
                if (count($errors) == 0) {
                    $extension = explode('/', $_FILES["picture"]["type"])[1];
                    $uniqFileName = uniqid() . '.' . $extension;
                    move_uploaded_file($_FILES["picture"]["tmp_name"], "public/img/" . $uniqFileName);
                }

                $moto = new Moto(
                    null,
                    $_POST["marque"],
                    $_POST["modele"],
                    $_POST["type"],
                    $uniqFileName
                );
                $this->mc->add($moto);
                header("Location: index.php?controller=moto&action=list");
            }
        }

        require "view/moto/form-add.php";
    }



    private function checkForm()
    {
        $errors = [];
        if (empty($_POST["marque"])) {
            $errors["marque"] = 'Veuillez saisir le marque de la moto';
        }

        if (strlen($_POST["marque"]) > 250) {
            $errors["marque"] = "Le nom de la marque est trop long (250 caractères maximum)";
        }
        if (empty($_POST["modele"])) {
            $errors["modele"] = 'Veuillez saisir le modele de la moto';
        }

        if (strlen($_POST["modele"]) > 250) {
            $errors["modele"] = "Le du modèle est trop long (250 caractères maximum)";
        }

        if (!in_array($_POST["type"], self::$allowedType)) {
            $errors["type"] = "Ce type n'existe pas";
        }

        return $errors;
    }

    public function delete($id)
    {
        $moto = $this->mc->getOne($id);

        if (is_null($moto)) {
            header('Location: index.php?controller=default&action=not-found&scope=moto');
        } else {
            $this->mc->delete($moto->getId());
            header("Location: index.php?controller=moto&action=list");
        }
    }
    // public function enduroOnly($type)
    // {
    //     $motoEnduro = $this->mc->getEnduro($type);

    //     if (is_null($motoEnduro)) {
    //         header("Location: index.php?controller=default&action=not-found&scope=moto");
    //     }

    //     require 'view/moto/list.php';
    // }
    // public function customOnly()
    // {
    //     
    // }
    // public function sportiveOnly()
    // {
    //     
    // }
    // public function roadsterOnly()
    // {
    //    
    // }
}
