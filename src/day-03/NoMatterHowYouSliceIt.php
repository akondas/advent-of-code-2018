<?php

declare(strict_types=1);

namespace AdventOfCode\Day3;

final class NoMatterHowYouSliceIt
{
    public static function overlaps(array $claims): int
    {
        $claims = self::extractClaims($claims);
        $overlaps = array_reduce($claims, function (array $overlaps, Rectangle $rec) use ($claims): array {
            foreach ($claims as $r) {
                if ($r === $rec || !$r->isOverlap($rec)) {
                    continue;
                }

                $overlaps = array_merge($overlaps, array_map(function (Point $point): string {
                    return $point->x().'x'.$point->y();
                }, $r->overlaps($rec)));
            }

            return $overlaps;
        }, []);

        return \count(array_unique($overlaps));
    }

    public static function noOverlaps(array $claims): string
    {
        $claims = self::extractClaims($claims);
        $noOverlaps = array_reduce($claims, function (array $noOverlaps, Rectangle $rec) use ($claims): array {
            foreach ($claims as $r) {
                if ($r->isOverlap($rec) && $r !== $rec) {
                    return $noOverlaps;
                }
            }
            $noOverlaps[] = $rec;

            return $noOverlaps;
        }, []);

        return $noOverlaps[0]->l()->x().'x'.$noOverlaps[0]->l()->y();
    }

    /**
     * @return Rectangle[]
     */
    private static function extractClaims(array $claims): array
    {
        return array_map(function (string $line): Rectangle {
            $elements = explode(' ', $line);
            $coords = explode(',', $elements[2]);
            $size = explode('x', $elements[3]);

            $l = new Point(((int) $coords[0]) + 1, ((int) trim($coords[1], ':')) + 1);

            return new Rectangle(
                $l,
                new Point($l->x() + ((int) $size[0]) - 1, $l->y() + ((int) trim($size[1])) - 1)
            );
        }, $claims);
    }
}
