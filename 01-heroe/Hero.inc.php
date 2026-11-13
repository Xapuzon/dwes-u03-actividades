<?php
require_once __DIR__ . '/../common/Accessors.inc.php';
require_once __DIR__ . '/Weapon.inc.php';
require_once __DIR__ . '/Armor.inc.php';
require_once __DIR__ . '/Potion.inc.php';

class Hero
{
    use Accessors;

    private string $name;
    private string $species;
    private string $heroClass;
    private int $health;
    private int $baseAttack;
    private int $baseDefense;
    private array $weapons = [];
    private array $armors = [];
    private array $potions = [];

    public function __construct(
        string $name,
        string $species,
        string $heroClass,
        int $health = 50,
        int $baseAttack = 10,
        int $baseDefense = 10
    ) {
        $this->name = $name;
        $this->species = $this->checkSpecies($species);
        $this->heroClass = $this->checkClass($heroClass);
        $this->health = $health;
        $this->baseAttack = $baseAttack;
        $this->baseDefense = $baseDefense;
    }

    public function __set(string $property, mixed $value): void
    {
        if (!property_exists($this, $property)) {
            throw new InvalidArgumentException("Propiedad desconocida: $property");
        }
        if ($property === 'species') {
            $value = $this->checkSpecies($value);
        } elseif ($property === 'heroClass') {
            $value = $this->checkClass($value);
        }
        $this->$property = $value;
    }

    private function checkSpecies(string $species): string
    {
        $valid = ['humano', 'elfo', 'enano', 'orco'];
        $species = strtolower($species);
        return in_array($species, $valid) ? $species : 'humano';
    }

    private function checkClass(string $class): string
    {
        $valid = ['guerrero', 'mago', 'arquero'];
        $class = strtolower($class);
        return in_array($class, $valid) ? $class : 'ninguna';
    }

    public function addWeapon(Weapon $weapon): void
    {
        $this->weapons[] = $weapon;
    }

    public function addArmor(Armor $armor): void
    {
        $this->armors[] = $armor;
    }

    public function addPotion(Potion $potion): void
    {
        $this->potions[] = $potion;
    }

    public function attack(): int
    {
        $total = $this->baseAttack;
        foreach ($this->weapons as $weapon) {
            $total += $weapon->attack;
        }
        return $total;
    }

    public function defense(int $damage): int
    {
        $total = $this->baseDefense;
        foreach ($this->armors as $armor) {
            $total += $armor->defense;
        }
        return max(0, $total - $damage);
    }

    public function usePotion(): bool
    {
        if (count($this->potions) === 0) {
            return false;
        }

        $bestIndex = 0;
        foreach ($this->potions as $index => $potion) {
            if ($potion->healing > $this->potions[$bestIndex]->healing) {
                $bestIndex = $index;
            }
        }

        $this->health += $this->potions[$bestIndex]->healing;
        unset($this->potions[$bestIndex]);
        $this->potions = array_values($this->potions);
        return true;
    }

    public function __toString(): string
    {
        $text = "Héroe: {$this->name} ({$this->species}, {$this->heroClass})<br>";
        $text .= "Vida: {$this->health} | Ataque base: {$this->baseAttack} | Defensa base: {$this->baseDefense}<br>";
        foreach ($this->weapons as $weapon) {
            $text .= "- $weapon<br>";
        }
        foreach ($this->armors as $armor) {
            $text .= "- $armor<br>";
        }
        foreach ($this->potions as $potion) {
            $text .= "- $potion<br>";
        }
        return $text;
    }
}
