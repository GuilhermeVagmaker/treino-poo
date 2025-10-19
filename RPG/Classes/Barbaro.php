<?php

namespace RPG\Classes;

use RPG\Personagem;

class Barbaro extends Personagem {

  private array $hab = [
    "giro mortal" => 30,
    "ataque imprudente" => 20,
    "ataque extra" => 10,
  ];
  private bool $emFuria = true;

public function __construct($nome, $hab = [], $vida = 120){
  parent::__construct($nome, $vida);
  if(!empty($hab)){
    $this->hab = $hab;
  }
}

public function furiaAtiva(){
  $this->hab["furia"] = true;
  echo "{$this->nome} agora está em estado de furia <br>";
}

public function furiaDesativada(){
  $this->hab["furia"] = false;
  echo "{$this->nome} está calmo, e n está em furia <br>";

}

public function atacar($ataques): int{
  if(isset($this->hab[$ataques])){
    $danoBase = $this->hab[$ataques] ?? 0;
    $bonusFuria = $this->hab["furia"] ? rand(2,5) : 0;
    $danoTotal = $danoBase + $bonusFuria;
    echo "{$this->nome} usa {$ataques} e causa {$danoTotal} de dano! <br>";
    return $danoTotal;
  } else {
      echo "{$this->nome} tentou usar {$ataques}, mas não conhece essa habilidade! <br>";
      return 0;
    }
}

}