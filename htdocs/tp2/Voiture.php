<?php
class Voiture {
    const nbRoues = 4;
    private string $couleur;
    private int $puissance;
    private int $vitesse;

    public function __construct(string $couleur, int $puissance, int$vitesse){
        $this->couleur = $couleur;
        $this->puissance = $puissance;
        $this->vitesse = $vitesse;
    }

    public function __get($property){
        if('couleur' == $property ){
            return $this->couleur;
        }elseif ('puissance' == $property){
            return $this->puissance;
        }elseif ('vitesse' == $property){
            return $this->vitesse;
        } else{
            throw new Exception('Propriété invalide');
        }
    }

    public function __set($property,$value){
        if('couleur' == $property && is_string($value)){
            $this->couleur = (string)$value;
        }elseif ('puissance' == $property && ctype_digit($value)){
            $this->puissance = (int)$value;
        }elseif ('vitesse' == $property && ctype_digit($value)){
            $this->vitesse = (int)$value;
        } else{
            throw new Exception('Propriété ou valeur invalide');
        }
    }


}