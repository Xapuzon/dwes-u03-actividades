<?php
require_once __DIR__ . '/Vehicle.inc.php';

class Truck extends Vehicle
{
    public function __construct(
        string $brand,
        string $model,
        int $year,
        protected int $capacity
    ) {
        parent::__construct($brand, $model, $year);
    }

    public function loadCargo(int $kg): void
    {
        if ($kg > $this->capacity) {
            echo "{$this->brand} {$this->model} no puede cargar $kg kg (máximo {$this->capacity} kg).<br>";
            return;
        }
        echo "{$this->brand} {$this->model} carga $kg kg.<br>";
    }

    public function __toString(): string
    {
        return 'Camión: ' . parent::__toString() . ", capacidad {$this->capacity} kg";
    }
}
