<?php
require_once __DIR__ . '/../common/Accessors.inc.php';

class Character
{
    use Accessors;

    private string $name;
    private int $age;
    private string $species;

    public function __construct(string $name, int $age = -1, string $species = 'humano')
    {
        $this->name = $name;
        $this->age = $this->checkAge($age);
        $this->species = $this->checkSpecies($species);
    }

    public function __set(string $property, mixed $value): void
    {
        if (!property_exists($this, $property)) {
            throw new InvalidArgumentException("Propiedad desconocida: $property");
        }
        if ($property === 'age') {
            $value = $this->checkAge($value);
        } elseif ($property === 'species') {
            $value = $this->checkSpecies($value);
        }
        $this->$property = $value;
    }

    private function checkAge(int $age): int
    {
        return $age < 0 ? -1 : $age;
    }

    private function checkSpecies(string $species): string
    {
        return preg_match('/\d/', $species) ? 'desconocida' : $species;
    }

    public function __toString(): string
    {
        $age = $this->age === -1 ? 'edad desconocida' : $this->age . ' años';
        return "{$this->name} ({$this->species}, $age)";
    }
}
