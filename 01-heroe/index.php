<?php
require_once __DIR__ . '/Hero.inc.php';
echo '<meta charset="UTF-8">';

$hero = new Hero('Aragorn', 'dragón', 'bardo');

$hero->addWeapon(new Weapon('Espada', 15));
$hero->addWeapon(new Weapon('Daga', 5));
$hero->addArmor(new Armor('Cota de malla', 12));
$hero->addPotion(new Potion(10));
$hero->addPotion(new Potion(30));
$hero->addPotion(new Potion(20));

echo '<h2>Antes</h2>';
echo $hero;

echo '<h2>Pruebas</h2>';
echo 'Ataque total: ' . $hero->attack() . '<br>';
echo 'Defensa ante 10 de daño: ' . $hero->defense(10) . '<br>';
echo 'Defensa ante 100 de daño: ' . $hero->defense(100) . '<br>';

$hero->usePotion();
$hero->species = 'elfo';
$hero->heroClass = 'mago';

echo '<h2>Después</h2>';
echo $hero;
