<?php
require_once __DIR__ . '/Car.inc.php';
require_once __DIR__ . '/Motorcycle.inc.php';
require_once __DIR__ . '/Truck.inc.php';
echo '<meta charset="UTF-8">';

$car = new Car('Seat', 'Ibiza', 2020, 5);
$moto = new Motorcycle('Yamaha', 'R1', 2022, 998);
$truck = new Truck('Volvo', 'FH', 2019, 20000);

foreach ([$car, $moto, $truck] as $vehicle) {
    echo "<h3>$vehicle</h3>";
    $vehicle->accelerate(50);
    $vehicle->accelerate(30);
    $vehicle->brake();
}

echo '<h3>Métodos específicos</h3>';
$car->openTrunk();
$moto->wheelie();
$truck->loadCargo(15000);
$truck->loadCargo(30000);

echo '<h3>Getters y setters mágicos</h3>';
echo 'Marca del coche: ' . $car->brand . '<br>';
$car->brand = 'Cupra';
echo 'Nueva marca: ' . $car->brand . '<br>';
