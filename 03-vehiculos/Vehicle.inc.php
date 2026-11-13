<?php
require_once __DIR__ . '/../common/Accessors.inc.php';

class Vehicle
{
    use Accessors;

    public function __construct(
        protected string $brand,
        protected string $model,
        protected int $year,
        protected int $speed = 0
    ) {
    }

    public function accelerate(int $kmh): void
    {
        $this->speed += $kmh;
        echo "{$this->brand} {$this->model} acelera hasta {$this->speed} km/h.<br>";
    }

    public function brake(): void
    {
        $this->speed = 0;
        echo "{$this->brand} {$this->model} frena y se detiene.<br>";
    }

    public function __toString(): string
    {
        return "{$this->brand} {$this->model} ({$this->year})";
    }
}
