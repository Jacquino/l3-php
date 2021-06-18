<?php

class Connexion{

    private static $_instance = null;
    public static function getPDO(): PDO
    {
        if (self::$_instance == null){
            $user = 'root';
            $pass = 'password';
            self::$_instance = new PDO('mysql:host=mysql;dbname=eurovent', $user, $pass);
        }
        return self::$_instance;
    }

}