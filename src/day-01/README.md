# Day 1: Inverse Captcha

[Problem description](https://adventofcode.com/2017/day/1)

## PHP solution

```php
function sum(string $input): int
{
    return array_sum(array_filter(str_split($input), function (string $current, int $key) use ($input): bool {
        return $current === $input[($key + 1) % \strlen($input)];
    }, ARRAY_FILTER_USE_BOTH));
}
```
