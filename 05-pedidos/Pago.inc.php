<?php
require_once __DIR__ . '/../common/Accessors.inc.php';

abstract class Pago
{
    use Accessors;

    abstract public function detalle(): string;

    public function __toString(): string
    {
        return $this->detalle();
    }
}

class Cheque extends Pago
{
    public function __construct(protected string $banco, protected string $numero)
    {
    }

    public function detalle(): string
    {
        return "Cheque nº {$this->numero} del banco {$this->banco}";
    }
}

class Efectivo extends Pago
{
    public function __construct(protected float $entregado)
    {
    }

    public function detalle(): string
    {
        return "Efectivo (entregado: {$this->entregado} €)";
    }
}

class Tarjeta extends Pago
{
    public function __construct(protected string $titular, protected string $numero)
    {
    }

    public function detalle(): string
    {
        // Solo mostramos los 4 últimos dígitos
        return "Tarjeta de {$this->titular} terminada en " . substr($this->numero, -4);
    }
}
