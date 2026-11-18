<?php
require_once __DIR__ . '/utils.inc.php';
echo '<meta charset="UTF-8">';

$ducati = new Team('Ducati Lenovo');
$ducati->addRider(new Rider('Francesco Bagnaia', 29, 'Italia', 1));
$ducati->addRider(new Rider('Enea Bastianini', 27, 'Italia', 23));
$ducati->addMechanic(new Mechanic('Marco Rossi', 40, 'Italia', 'motor'));
$ducati->addMechanic(new Mechanic('Luca Neri', 35, 'Italia', 'electrónica'));

$yamaha = new Team('Yamaha Factory');
$yamaha->addRider(new Rider('Fabio Quartararo', 27, 'Francia', 20));
$yamaha->addRider(new Rider('Alex Rins', 29, 'España', 42));
$yamaha->addMechanic(new Mechanic('Pierre Dubois', 45, 'Francia', 'chasis'));
$yamaha->addMechanic(new Mechanic('Jordi Vila', 38, 'España', 'neumáticos'));

printTitle('Equipos');
echo $ducati . '<br>' . $yamaha;

$jerez = new Circuit('Ángel Nieto', 'España', 'Jerez de la Frontera', 4.423, 5, 8);
$mugello = new Circuit('Mugello', 'Italia', 'Scarperia', 5.245, 6, 9);
$lemans = new Circuit('Le Mans', 'Francia', 'Le Mans', 4.185, 5, 9);

$gp1 = new GrandPrix('GP de España', $jerez, '2026-04-26');
$gp2 = new GrandPrix('GP de Italia', $mugello, '2026-05-31');
$gp3 = new GrandPrix('GP de Francia', $lemans, '2026-05-17');

$riders = array_merge($ducati->riders, $yamaha->riders);

foreach ([[0, 2, 1, 3], [2, 0, 3, 1], [1, 3, 0, 2]] as $i => $order) {
    $gp = [$gp1, $gp2, $gp3][$i];
    foreach ($order as $pos => $riderIndex) {
        $gp->addRider($pos + 1, $riders[$riderIndex]);
    }
}

$added = $gp1->addRider(1, $riders[3]);

printTitle('Grandes premios');
echo $gp1 . '<br>' . $gp2 . '<br>' . $gp3;
echo '<br>¿Se añadió un piloto a una posición ocupada? ' . ($added ? 'sí' : 'no');
