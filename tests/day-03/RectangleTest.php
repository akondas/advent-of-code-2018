<?php

declare(strict_types=1);

namespace AdventOfCode\Day3;

use PHPUnit\Framework\TestCase;

final class RectangleTest extends TestCase
{
    public function testRectangleOverlapsPoints(): void
    {
        $first = new Rectangle(new Point(2, 4), new Point(5, 7));
        $second = new Rectangle(new Point(4, 2), new Point(7, 5));

        self::assertEquals([
            new Point(4, 4),
            new Point(4, 5),
            new Point(5, 4),
            new Point(5, 5),
        ], $first->overlaps($second));
    }

    public function testRectangleNoOverlapsPoints(): void
    {
        $first = new Rectangle(new Point(2, 4), new Point(5, 7));
        $second = new Rectangle(new Point(6, 8), new Point(7, 9));

        self::assertEquals([
        ], $first->overlaps($second));
    }
}
