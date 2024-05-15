<?php
class loginController{
    public static function index(){
        include 'database/database.php';
        include 'views/login/login.php';
    }

    public static function login(){
        include 'database/database.php';
        include 'middleware/login-admin.php';
        include 'views/login/login.php';
    }

    public static function register(){
        include 'database/database.php';
        include 'views/clientes_archivos/register/register.php';
    }

    public static function registerUser(){
        include 'database/database.php';
        include 'middleware/register-user.php';
    }
}




?>