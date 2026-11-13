<?php
require_once __DIR__ . '/Vehicle.inc.php';

class Motorcycle extends Vehicle
{
    public function __construct(
        string $brand,
        string $model,
        int $year,
        protected int $cc
    ) {
        parent::__construct($brand, $model, $year);
    }

    public function wheelie(): void
    {
        echo "{$this->brand} {$this->model} hace un caballito.<br>";
    }

    public function __toString(): string
    {
        return 'Moto: ' . parent::__toString() . ", {$this->cc} cc";
    }
}
