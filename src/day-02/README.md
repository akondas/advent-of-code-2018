# Day 2: Inventory Management System

[Problem description](https://adventofcode.com/2018/day/2)

## PHP solution

```php
public function checksum(array $ids): int
{
    $counts = array_reduce($ids, function(array $counts, string $id) {
        $letters = array_count_values(str_split($id));
        if(in_array(2, $letters)) {
            $counts['2']++;
        }
        if(in_array(3, $letters)) {
            $counts['3']++;
        }

        return $counts;
    }, ['2' => 0, '3' => 0]);

    return $counts['2'] * $counts['3'];
}
```

Second:

```php
public function find(array $ids): string
{
    $strings = [];
    foreach ($ids as $id) {
        foreach ($ids as $id2) {
            if($id === $id2) {
                continue;
            }
            if(levenshtein($id, $id2) === 1) {
                $strings[] = $id;
                $strings[] = $id2;
                break 2;
            }
        }
    }

    return $strings[0].' '.$strings[1];
}
```
