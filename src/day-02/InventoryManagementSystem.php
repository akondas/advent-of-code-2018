<?php

declare(strict_types=1);

namespace AdventOfCode\Day2;

final class InventoryManagementSystem
{
    public static function checksum(array $ids): int
    {
        $counts = array_reduce($ids, function (array $counts, string $id) {
            $letters = array_count_values(str_split($id));
            if (\in_array(2, $letters)) {
                ++$counts['2'];
            }
            if (\in_array(3, $letters)) {
                ++$counts['3'];
            }

            return $counts;
        }, ['2' => 0, '3' => 0]);

        return $counts['2'] * $counts['3'];
    }

    public static function find(array $ids): string
    {
        $strings = [];
        foreach ($ids as $id) {
            foreach ($ids as $id2) {
                if ($id === $id2) {
                    continue;
                }
                if (1 === levenshtein($id, $id2)) {
                    $strings[] = $id;
                    $strings[] = $id2;
                    break 2;
                }
            }
        }

        return $strings[0].' '.$strings[1];
    }
}
