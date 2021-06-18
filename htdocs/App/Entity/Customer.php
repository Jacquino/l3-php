<?php


namespace App\Entity;


class Customer implements EntityInterface
{
    private $id;
    private $name;
    private $age;

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $price
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id) : void{
        $this->id = $id;
    }
}