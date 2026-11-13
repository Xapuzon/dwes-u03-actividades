<?php
// Sistema de puntuación oficial de MotoGP (carrera larga)
class Scoring
{
    private const POINTS = [25, 20, 16, 13, 11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1];

    public static function pointsFor(int $position): int
    {
        return self::POINTS[$position - 1] ?? 0;
    }
}
