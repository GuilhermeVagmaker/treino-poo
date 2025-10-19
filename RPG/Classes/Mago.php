<?php

namespace RPG\Classes;

use RPG\Personagem;

class Mago extends Personagem{

  public $magia = [
    "bola de fogo" => 30,
    "raio de gelo" => 20,
    "relampago" => 10
    ];

  public function __construct($nome, $magia = [], $vida = 70){
    parent::__construct($nome, $vida);
    $this->magia = $magia;
  }
  public function despertarMagico(){
    echo "{$this->nome} despertou suas magias, e agora elas estão mais fortes do que nunca <br>";
  }

  public function dadoMago(){
    return rand(1,20);
  }

  public function atacar($nomeMagia, $circulo): int{

    if(isset($this->magia[$nomeMagia])){
      $danoBase = $this->magia[$nomeMagia] ?? 0;
      $danoTotal = $danoBase * $circulo;
      echo "{$this->nome} usou a magia de {$nomeMagia} no circulo {$circulo} e deu {$danoTotal} de dano <br>";
      return $danoTotal;
    }else{
      echo "{$this->nome}, n tem essa magia <br>";
      return 0;
    }
    
  }


  
}