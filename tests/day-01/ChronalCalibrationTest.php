<?php

declare(strict_types=1);

namespace AdventOfCode\Day1;

use PHPUnit\Framework\TestCase;

final class ChronalCalibrationTest extends TestCase
{
    /**
     * @dataProvider examples
     */
    public function testChronalCalibrationFrequency(array $lines, int $frequency): void
    {
        self::assertEquals($frequency, ChronalCalibration::frequency($lines));
    }

    public function examples(): array
    {
        return [
            [explode(',', '+1,-2,+3,+1'), 3],
            [explode(',', '+1,+1,+1'), 3],
            [explode(',', '+1,+1,-2'), 0],
            [explode(',', '-1,-2,-3'), -6],
        ];
    }

    /**
     * @dataProvider examples2
     */
    public function testChronalCalibrationFrequencyTwice(array $lines, int $frequency): void
    {
        self::assertEquals($frequency, ChronalCalibration::frequencyTwice($lines));
    }

    public function examples2(): array
    {
        return [
            [explode(',', '+1, -1'), 1],
            [explode(',', '+3, +3, +4, -2, -4'), 10],
            [explode(',', '-6, +3, +8, +5, -6'), 5],
            [explode(',', '+7, +7, -2, -7, -4'), 14],
        ];
    }
}
