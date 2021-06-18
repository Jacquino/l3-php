<?php

namespace App\Entity\Repository;

use App\Entity\EntityInterface;
use Connexion;
use PDO;

class Product extends AbstractRepository implements RepositoryInterface
{
    public function findAll() : array{
        $PDO = Connexion::getPDO();
        //$all = $PDO ->query("Select * from product",PDO::FETCH_ASSOC )->fetchAll();
        $query = $PDO ->query("Select * from product");

        /*foreach ($all as $row){
            var_dump($row);
            $prod = new \App\Entity\Product($row['name'],$row['price']);
            $array[] = $prod;
        }*/
        //return $array;
        /*$test = $query->fetchAll(PDO::FETCH_CLASS,\App\Entity\Product::class);
        var_dump($test);die;*/
        return $query->fetchAll(PDO::FETCH_CLASS,\App\Entity\Product::class);
    }

    public function find(int $id) : EntityInterface{
        $PDO = Connexion::getPDO();
        return $PDO ->query("Select * from product where id = "+$id+"",PDO::FETCH_ASSOC );
    }

    public function findBy($column,$value) : array{
        $PDO = Connexion::getPDO();
        return $PDO ->query("Select * from product where "+$column+" = "+$value+"",PDO::FETCH_ASSOC );
    }
}