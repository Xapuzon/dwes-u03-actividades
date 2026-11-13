<?php
require_once __DIR__ . '/../common/Accessors.inc.php';

class Person
{
    use Accessors;

    public function __construct(
        protected string $name,
        protected int $age,
        protected string $nationality
    ) {
    }

    public function __toString(): string
    {
        return "{$this->name} ({$this->age} años, {$this->nationality})";
    }
}

class Mechanic extends Person
{
    public function __construct(
        string $name,
        int $age,
        string $nationality,
        protected string $speciality
    ) {
        parent::__construct($name, $age, $nationality);
    }

    public function __toString(): string
    {
        return parent::__toString() . " - Mecánico de {$this->speciality}";
    }
}

class Rider extends Person
{
    public function __construct(
        string $name,
        int $age,
        string $nationality,
        protected int $number
    ) {
        parent::__construct($name, $age, $nationality);
    }

    public function __toString(): string
    {
        return parent::__toString() . " - Piloto #{$this->number}";
    }
}
