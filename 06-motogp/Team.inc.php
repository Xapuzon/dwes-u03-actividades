<?php
require_once __DIR__ . '/Person.inc.php';

class Team
{
    use Accessors;

    protected array $riders = [];
    protected array $mechanics = [];

    public function __construct(protected string $name)
    {
    }

    public function addRider(Rider $rider): void
    {
        $this->riders[] = $rider;
    }

    public function addMechanic(Mechanic $mechanic): void
    {
        $this->mechanics[] = $mechanic;
    }

    public function __toString(): string
    {
        $text = "<strong>Equipo {$this->name}</strong><br>Pilotos:<br>";
        foreach ($this->riders as $rider) {
            $text .= "- $rider<br>";
        }
        $text .= 'Mecánicos:<br>';
        foreach ($this->mechanics as $mechanic) {
            $text .= "- $mechanic<br>";
        }
        return $text;
    }
}
