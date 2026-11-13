<?php
require_once __DIR__ . '/../common/Accessors.inc.php';

class Circuit
{
    use Accessors;

    public function __construct(
        protected string $name,
        protected string $country,
        protected string $locality,
        protected float $kilometers,
        protected int $leftTurns,
        protected int $rightTurns
    ) {
    }

    public function __toString(): string
    {
        return "{$this->name} ({$this->locality}, {$this->country}) - {$this->kilometers} km, "
            . "{$this->leftTurns} curvas a izquierda y {$this->rightTurns} a derecha";
    }
}
