<?php

abstract class ConnexionManager
{
    private static $connexion;

    private static function setConnexionBdd()
    {
        self::$connexion = new PDO("mysql:host=biblio_db;dbname=biblio", "db_user", "12345");
        self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getConnexionBdd()
    {
        if (self::$connexion === null) {
            self::setConnexionBdd();
        }
        return self::$connexion;
    }
}
