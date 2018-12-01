# Day 1: Chronal Calibration

[Problem description](https://adventofcode.com/2018/day/1)

## PHP solution

```php
public function frequency(array $lines): int
{
    return array_reduce($lines, function (int $frequency, string $next): int {
        return $frequency + (int) $next;
    }, 0);
}
```

Second:

```
public function frequencyTwice(array $lines): int
{
    $frequency = 0;
    $frequencies = array_map(function (string $next) use (&$frequency): int {
        $frequency += (int) $next;

        return $frequency;
    }, $lines);

    $nextIndex = 0;
    while (true) {
        $frequency += (int) $lines[$nextIndex];

        if (in_array($frequency, $frequencies)) {
            return $frequency;
        }

        ++$nextIndex;
        if ($nextIndex == count($lines)) {
            $nextIndex = 0;
        }
    }
}
```
