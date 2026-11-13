<?php
require_once __DIR__ . '/Vehicle.inc.php';

class Car extends Vehicle
{
    public function __construct(
        string $brand,
        string $model,
        int $year,
        protected int $doors
    ) {
        parent::__construct($brand, $model, $year);
    }

    public function openTrunk(): void
    {
        echo "{$this->brand} {$this->model} abre el maletero.<br>";
    }

    public function __toString(): string
    {
        return 'Coche: ' . parent::__toString() . ", {$this->doors} puertas";
    }
}
