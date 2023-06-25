<?php

require 'model/manager/UserManager.php';
session_start();
// setcookie("nom_du_cookie", "valeur_du_cookie", time() + 3600, "/");
// $cookieValue = $_COOKIE["nom_du_cookie"];
class SecurityController
{

    private $userManager;

    protected $currentUser;


    public function __construct()
    {

        $this->userManager = new UserManager();
        $this->currentUser = null;

        if (array_key_exists("user", $_SESSION)) {

            $this->currentUser = unserialize($_SESSION["user"]);
        }
    }


    protected function isLoggedIn()
    {
        if (!$this->currentUser) {
            header("Location: index.php?controller=security&action=login");
            die();
        }
    }

    public function logout()
    {
        session_destroy();
        $this->currentUser = null;

        header('Location: index.php?controller=security&action=login');
    }

    public function login()
    {
        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            if (empty($_POST["username"])) {
                $errors["username"] = 'Veuillez saisir un login';
            }

            if (empty($_POST["password"])) {
                $errors["password"] = 'Veuillez saisir un mot de passe';
            }

            if (count($errors) == 0) {
                $user = $this->userManager->getByUsername($_POST["username"]);

                if (is_null($user) || !password_verify($_POST["password"], $user->getPassword())) {
                    $errors["password"] = 'Identifiant ou mot de passe invalide';
                } else {
                    $this->currentUser = $user;
                    $_SESSION["user"] = serialize($user);
                    header('Location: index.php?controller=moto&action=list');
                }
                
            }
            
        }
        require 'view/security/login.php';
    }
    
}
