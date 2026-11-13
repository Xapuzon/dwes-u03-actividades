<?php
// Importa todas las clases y define utilidades comunes.
require_once __DIR__ . '/Person.inc.php';
require_once __DIR__ . '/Team.inc.php';
require_once __DIR__ . '/Circuit.inc.php';
require_once __DIR__ . '/GrandPrix.inc.php';

function printTitle(string $title): void
{
    echo "<h2>$title</h2>";
}
