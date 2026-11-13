<?php
require_once __DIR__ . '/../common/Accessors.inc.php';
require_once __DIR__ . '/Character.inc.php';

class Anime
{
    use Accessors;

    private const GENRES = ['Kodomo', 'Shonen', 'Shojo', 'Seinen', 'Josei'];

    private string $title;
    private int $year;
    private string $genre;
    private array $characters = [];

    public function __construct(string $title, int $year = -1, string $genre = 'desconocido')
    {
        $this->title = $title;
        $this->year = $this->checkYear($year);
        $this->genre = $this->checkGenre($genre);
    }

    public function __set(string $property, mixed $value): void
    {
        if (!property_exists($this, $property)) {
            throw new InvalidArgumentException("Propiedad desconocida: $property");
        }
        if ($property === 'year') {
            $value = $this->checkYear($value);
        } elseif ($property === 'genre') {
            $value = $this->checkGenre($value);
        }
        $this->$property = $value;
    }

    private function checkYear(int $year): int
    {
        return $year >= 1917 ? $year : -1;
    }

    private function checkGenre(string $genre): string
    {
        return in_array($genre, self::GENRES) ? $genre : 'desconocido';
    }

    public function countCharacters(): int
    {
        return count($this->characters);
    }

    public function addCharacter(Character $character): bool
    {
        if ($this->checkCharacter($character->name)) {
            return false;
        }
        $this->characters[] = $character;
        return true;
    }

    public function removeCharacter(string $name): bool
    {
        foreach ($this->characters as $index => $character) {
            if ($character->name === $name) {
                unset($this->characters[$index]);
                $this->characters = array_values($this->characters);
                return true;
            }
        }
        return false;
    }

    public function checkCharacter(string $name): bool
    {
        foreach ($this->characters as $character) {
            if ($character->name === $name) {
                return true;
            }
        }
        return false;
    }

    public function __toString(): string
    {
        $year = $this->year === -1 ? 'año desconocido' : $this->year;
        return "{$this->title} ($year) - Género: {$this->genre}";
    }
}
