<?php
class DefaultController extends SecurityController
{

    public function __construct()
    {
        parent::__construct();
        parent::isLoggedIn();
    }

    public function homepage()
    {
        require 'view/homepage.php';
    }

    public function notFound()
    {
        http_response_code(404);
        require 'view/errors/error404.php';
    }
}
