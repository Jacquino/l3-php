<?php

namespace App\Entity\Repository;

use App\Entity\EntityInterface;
use Connexion;
use PDO;

class Product extends AbstractRepository implements RepositoryInterface
{
    public function getConnexion(): \PDO
    {
        return parent::getConnexion();
    }

    public function findAll() : array{
        $PDO = Product::getConnexion();
        $query = $PDO ->query("Select * from product");
        return $query->fetchAll(PDO::FETCH_CLASS,\App\Entity\Product::class);
    }

    public function find(int $id) : EntityInterface{
        $PDO = Product::getConnexion();
        $query = $PDO ->query("Select * from product where id = ".$id);
        /*$test = $query->fetchObject(\App\Entity\Product::class);
        var_dump($test);die;*/
        return $query->fetchObject(\App\Entity\Product::class);
    }

    public function findBy($column,$value) : array{
        $PDO = Product::getConnexion();
        $query = $PDO ->query("Select * from product where ".$column." = ".$value);
        return $query->fetchAll(PDO::FETCH_CLASS,\App\Entity\Product::class);
    }
}