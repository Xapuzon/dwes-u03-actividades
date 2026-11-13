<?php
require_once __DIR__ . '/../common/Accessors.inc.php';

class Armor
{
    use Accessors;

    public function __construct(private string $name, private int $defense)
    {
    }

    public function __toString(): string
    {
        return "Armadura: {$this->name} (defensa +{$this->defense})";
    }
}
