<?php
require_once __DIR__ . '/Season.inc.php';
echo '<meta charset="UTF-8">';

$bagnaia = new Rider('Francesco Bagnaia', 29, 'Italia', 1);
$bastianini = new Rider('Enea Bastianini', 27, 'Italia', 23);
$quartararo = new Rider('Fabio Quartararo', 27, 'Francia', 20);
$rins = new Rider('Alex Rins', 29, 'España', 42);

$jerez = new Circuit('Ángel Nieto', 'España', 'Jerez de la Frontera', 4.423, 5, 8);
$mugello = new Circuit('Mugello', 'Italia', 'Scarperia', 5.245, 6, 9);
$lemans = new Circuit('Le Mans', 'Francia', 'Le Mans', 4.185, 5, 9);

$season = new Season('Temporada 2026');

$orders = [
    ['GP de España', $jerez, '2026-04-26', [$bagnaia, $quartararo, $bastianini, $rins]],
    ['GP de Italia', $mugello, '2026-05-31', [$quartararo, $bagnaia, $rins, $bastianini]],
    ['GP de Francia', $lemans, '2026-05-17', [$bagnaia, $rins, $quartararo, $bastianini]],
];

foreach ($orders as [$name, $circuit, $date, $finish]) {
    $gp = new GrandPrix($name, $circuit, $date);
    foreach ($finish as $i => $rider) {
        $gp->addRider($i + 1, $rider);
    }
    $season->addGrandPrix($gp);
}

printTitle('Clasificación por carreras');
foreach ($season->getGrandPrix() as $gp) {
    echo "<h3>{$gp->name}</h3>";
    foreach ($season->raceRanking($gp) as $position => $entry) {
        echo "$position. {$entry['rider']} - {$entry['points']} puntos<br>";
    }
}

printTitle('Clasificación general');
$position = 1;
foreach ($season->generalRanking() as $name => $points) {
    echo "$position. $name - $points puntos<br>";
    $position++;
}

printTitle('Mejor piloto de la temporada');
echo $season->bestRider();
