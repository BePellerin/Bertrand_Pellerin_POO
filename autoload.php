<?php
spl_autoload_register(function ($className) {
    if (str_ends_with($className, "Controller")) {
        require 'controller/' . $className . '.php';
    } elseif (str_ends_with($className, "Manager")) {
        require 'model/manager/' . $className . '.php';
    } else {
        require 'model/class/' . $className . '.php';
    }
    
});
