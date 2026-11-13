<?php
require_once __DIR__ . '/../common/Accessors.inc.php';

class Potion
{
    use Accessors;

    public function __construct(private int $healing)
    {
    }

    public function __toString(): string
    {
        return "Poción (+{$this->healing} de vida)";
    }
}
