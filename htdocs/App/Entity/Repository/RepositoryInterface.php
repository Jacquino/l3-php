<?php


namespace App\Entity\Repository;


use App\Entity\EntityInterface;

interface RepositoryInterface
{
    public function findAll() : array;

    public function find(int $id) : EntityInterface;

    public function findBy($column,$value) : array;
}