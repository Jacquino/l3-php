<?php


namespace App\Entity\Repository;

use App\Entity\EntityInterface;
use PDO;

class Customer extends AbstractRepository implements RepositoryInterface
{
    public function getConnexion(): \PDO
    {
        return parent::getConnexion();
    }

    public function findAll() : array{
        $PDO = Customer::getConnexion();
        $query = $PDO ->query("Select * from customer");
        return $query->fetchAll(PDO::FETCH_CLASS,\App\Entity\Customer::class);
    }

    public function find(int $id) : EntityInterface{
        $PDO = Customer::getConnexion();
        $query = $PDO ->query("Select * from customer where id = ".$id);
        return $query->fetchObject(\App\Entity\Customer::class);
    }

    public function findBy($column,$value) : array{
        $PDO = Customer::getConnexion();
        $query = $PDO ->query("Select * from customer where ".$column." = ".$value);
        return $query->fetchAll(PDO::FETCH_CLASS,\App\Entity\Customer::class);
    }

}