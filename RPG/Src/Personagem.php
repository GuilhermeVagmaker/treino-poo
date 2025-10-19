<?php

namespace RPG;

abstract class Personagem{

  protected $nome;
  protected $vida;

  public function __construct( string $nome, int $vida = 100) {
    $this->nome = $nome;
    $this->vida = $vida;
  }

  public function tomarDano(int $danoRecebido):void {
    $this->vida -= $danoRecebido;
    echo "{$this->nome} recebeu {$danoRecebido} e tem {$this->vida} restante de vida";
  }

  public function getNome(): string{
     return $this->nome;
  }

  public function getVida(): int{
    return $this->vida;
  }

  public function dado(): int{
    return rand(1,20);
  }
  
}
