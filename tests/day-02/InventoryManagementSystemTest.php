<?php

declare(strict_types=1);

namespace AdventOfCode\Day2;

use PHPUnit\Framework\TestCase;

final class InventoryManagementSystemTest extends TestCase
{
    public function testChecksum(): void
    {
        $input = [
            'abcdef',
            'bababc',
            'abbcde',
            'abcccd',
            'aabcdd',
            'abcdee',
            'ababab',
        ];

        self::assertEquals(12, InventoryManagementSystem::checksum($input));
    }
}
