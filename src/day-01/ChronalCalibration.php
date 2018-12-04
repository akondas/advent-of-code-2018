<?php

declare(strict_types=1);

namespace AdventOfCode\Day1;

final class ChronalCalibration
{
    public static function frequency(array $lines): int
    {
        return array_reduce($lines, function (int $frequency, string $next): int {
            return $frequency + (int) $next;
        }, 0);
    }

    public static function frequencyTwice(array $lines): int
    {
        $frequency = 0;
        $frequencies = array_map(function (string $next) use (&$frequency): int {
            $frequency += (int) $next;

            return $frequency;
        }, $lines);

        $nextIndex = 0;
        while (true) {
            $frequency += (int) $lines[$nextIndex];

            if (\in_array($frequency, $frequencies)) {
                return $frequency;
            }

            ++$nextIndex;
            if ($nextIndex == \count($lines)) {
                $nextIndex = 0;
            }
        }
    }
}
