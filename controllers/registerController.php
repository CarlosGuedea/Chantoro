<?php

class RegisterController{
    public static function index(){
        include 'database/database.php';
        include 'middleware/register-user.php';
        include 'views/register/register.php';
    }
}

?>