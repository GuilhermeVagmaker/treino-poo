<?php

require_once __DIR__ . '/Src/Personagem.php';
require_once __DIR__ . '/Classes/Barbaro.php';
require_once __DIR__ . '/Classes/Mago.php';

use RPG\Classes\Barbaro;
use RPG\Classes\Mago;

echo "<h2>🔥 Arena de Batalha 🔥</h2>";

// Cria os personagens (poderiam vir de um formulário futuramente)
$barbaro = new Barbaro("Kildrak");
$mago = new Mago("Elrion");

// Ativa a fúria do bárbaro e o poder mágico do mago
$barbaro->furiaAtiva();
$mago->despertarMagico();

echo "<hr><b>🎲 Iniciando rodada...</b><br>";

// Teste de iniciativa (quem age primeiro)
$dadoBarbaro = $barbaro->dadoBarbaro();
$dadoMago = $mago->dadoMago();

echo "{$barbaro->getNome()} rolou {$dadoBarbaro}<br>";
echo "{$mago->getNome()} rolou {$dadoMago}<br><hr>";

if ($dadoBarbaro > $dadoMago) {
    echo "<b>{$barbaro->getNome()} ataca primeiro!</b><br>";
    $dano = $barbaro->atacar("giro mortal");
    $mago->tomarDano($dano);
} else {
    echo "<b>{$mago->getNome()} ataca primeiro!</b><br>";
    $dano = $mago->atacar("bola de fogo", 4);
    $barbaro->tomarDano($dano);
}

echo "<hr>";
echo "<b>⚔️ Estado final da batalha:</b><br>";
echo "{$barbaro->getNome()} — Vida: {$barbaro->getVida()}<br>";
echo "{$mago->getNome()} — Vida: {$mago->getVida()}<br>";

if ($barbaro->getVida() <= 0) {
    echo "<h3>☠️ {$barbaro->getNome()} foi derrotado!</h3>";
} elseif ($mago->getVida() <= 0) {
    echo "<h3>☠️ {$mago->getNome()} foi derrotado!</h3>";
} else {
    echo "<h3>💥 Ambos ainda estão de pé!</h3>";
}

?>