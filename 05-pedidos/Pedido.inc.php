<?php
require_once __DIR__ . '/../common/Accessors.inc.php';
require_once __DIR__ . '/Cliente.inc.php';
require_once __DIR__ . '/LineaPedido.inc.php';
require_once __DIR__ . '/Pago.inc.php';

class Pedido
{
    use Accessors;

    protected array $lineas = []; // composición: las líneas viven dentro del pedido
    protected ?Pago $pago = null;

    public function __construct(protected Cliente $cliente, protected string $fecha)
    {
    }

    // El pedido crea sus propias líneas (composición)
    public function addLinea(Producto $producto, int $cantidad): void
    {
        $this->lineas[] = new LineaPedido($producto, $cantidad);
    }

    public function setPago(Pago $pago): void
    {
        $this->pago = $pago;
    }

    // Ampliación: importe total
    public function total(): float
    {
        $total = 0.0;
        foreach ($this->lineas as $linea) {
            $total += $linea->subtotal();
        }
        return $total;
    }

    public function __toString(): string
    {
        $text = "<strong>Pedido del {$this->fecha}</strong><br>Cliente: {$this->cliente}<br>";
        foreach ($this->lineas as $linea) {
            $text .= "- $linea<br>";
        }
        $text .= 'Total: ' . number_format($this->total(), 2) . ' €<br>';
        $text .= 'Pago: ' . ($this->pago ?? 'pendiente') . '<br>';
        return $text;
    }
}
