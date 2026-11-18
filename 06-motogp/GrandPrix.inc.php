<?php
require_once __DIR__ . '/Circuit.inc.php';
require_once __DIR__ . '/Person.inc.php';

class GrandPrix
{
    use Accessors;

    protected array $results = [];

    public function __construct(
        protected string $name,
        protected Circuit $circuit,
        protected string $date
    ) {
    }

    public function addRider(int $position, Rider $rider): bool
    {
        if (isset($this->results[$position])) {
            return false;
        }
        $this->results[$position] = $rider;
        return true;
    }

    public function getResults(): array
    {
        $results = $this->results;
        ksort($results);
        return $results;
    }

    public function __toString(): string
    {
        $text = "<strong>{$this->name}</strong> - {$this->date}<br>Circuito: {$this->circuit}<br>";
        foreach ($this->getResults() as $position => $rider) {
            $text .= "$position. $rider<br>";
        }
        return $text;
    }
}
