<?php
require_once __DIR__ . '/../common/Accessors.inc.php';

class Cliente
{
    use Accessors;

    public function __construct(
        protected string $nombre,
        protected string $email,
        protected string $direccion
    ) {
    }

    public function __toString(): string
    {
        return "{$this->nombre} ({$this->email}) - {$this->direccion}";
    }
}
