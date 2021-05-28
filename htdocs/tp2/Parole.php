<?php
abstract class Parole{
    abstract protected function direBonjour();
}

class ParoleFrancais extends Parole{
    protected function direBonjour()
    {
        echo "Bonjour !";
    }
}