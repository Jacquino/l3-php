<?php
namespace App\Entity\Repository;
use Connexion;

abstract class AbstractRepository implements RepositoryInterface{

    function getConnexion(): \PDO
    {
        return Connexion::getPDO();
    }
}