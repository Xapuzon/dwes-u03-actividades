<?php
require_once __DIR__ . '/Pedido.inc.php';
echo '<meta charset="UTF-8">';

$portatil = new Producto('Portátil', 899.99);
$raton = new Producto('Ratón', 19.5);
$monitor = new Producto('Monitor', 149.0);

$cliente = new Cliente('Laura Pérez', 'laura@mail.com', 'C/ Mayor 5, Valencia');

$pedido1 = new Pedido($cliente, '2026-11-04');
$pedido1->addLinea($portatil, 1);
$pedido1->addLinea($raton, 2);
$pedido1->setPago(new Tarjeta('Laura Pérez', '4111111111111234'));

$pedido2 = new Pedido($cliente, '2026-11-05');
$pedido2->addLinea($monitor, 2);
$pedido2->setPago(new Cheque('Banco Sabadell', '000321'));

$pedido3 = new Pedido($cliente, '2026-11-06');
$pedido3->addLinea($raton, 1);
$pedido3->setPago(new Efectivo(20.0));

foreach ([$pedido1, $pedido2, $pedido3] as $pedido) {
    echo $pedido . '<hr>';
}
