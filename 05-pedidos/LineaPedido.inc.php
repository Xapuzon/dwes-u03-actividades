<?php
require_once __DIR__ . '/../common/Accessors.inc.php';
require_once __DIR__ . '/Producto.inc.php';

class LineaPedido
{
    use Accessors;

    public function __construct(protected Producto $producto, protected int $cantidad)
    {
    }

    public function subtotal(): float
    {
        return $this->producto->precio * $this->cantidad;
    }

    public function __toString(): string
    {
        return "{$this->cantidad} x {$this->producto} = " . number_format($this->subtotal(), 2) . ' €';
    }
}
