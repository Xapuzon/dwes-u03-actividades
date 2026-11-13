<?php
require_once __DIR__ . '/../common/Accessors.inc.php';

class Weapon
{
    use Accessors;

    public function __construct(private string $name, private int $attack)
    {
    }

    public function __toString(): string
    {
        return "Arma: {$this->name} (ataque +{$this->attack})";
    }
}
