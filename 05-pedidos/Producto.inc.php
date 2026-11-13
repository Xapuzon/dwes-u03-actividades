<?php
require_once __DIR__ . '/../common/Accessors.inc.php';

class Producto
{
    use Accessors;

    public function __construct(protected string $nombre, protected float $precio)
    {
    }

    public function __toString(): string
    {
        return "{$this->nombre} ({$this->precio} €)";
    }
}
