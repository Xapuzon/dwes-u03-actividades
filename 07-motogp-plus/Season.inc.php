<?php
require_once __DIR__ . '/../06-motogp/utils.inc.php';
require_once __DIR__ . '/Scoring.inc.php';

class Season
{
    private array $grandPrix = [];

    public function __construct(private string $name)
    {
    }

    public function addGrandPrix(GrandPrix $gp): void
    {
        $this->grandPrix[] = $gp;
    }

    public function raceRanking(GrandPrix $gp): array
    {
        $ranking = [];
        foreach ($gp->getResults() as $position => $rider) {
            $ranking[$position] = ['rider' => $rider->name, 'points' => Scoring::pointsFor($position)];
        }
        return $ranking;
    }

    public function generalRanking(): array
    {
        $totals = [];
        foreach ($this->grandPrix as $gp) {
            foreach ($this->raceRanking($gp) as $entry) {
                $totals[$entry['rider']] = ($totals[$entry['rider']] ?? 0) + $entry['points'];
            }
        }
        arsort($totals);
        return $totals;
    }

    public function bestRider(): ?string
    {
        $ranking = $this->generalRanking();
        return count($ranking) > 0 ? array_key_first($ranking) : null;
    }

    public function getGrandPrix(): array
    {
        return $this->grandPrix;
    }
}
