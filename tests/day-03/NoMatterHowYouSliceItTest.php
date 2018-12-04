<?php

declare(strict_types=1);

namespace AdventOfCode\Day3;

use PHPUnit\Framework\TestCase;

final class NoMatterHowYouSliceItTest extends TestCase
{
    public function testOverlaps(): void
    {
        $input = [
            '#1 @ 1,3: 4x4',
            '#2 @ 3,1: 4x4',
            '#3 @ 5,5: 2x2',
        ];

        self::assertEquals(4, NoMatterHowYouSliceIt::overlaps($input));
    }
}
