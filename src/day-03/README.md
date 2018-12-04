# Day 3: No Matter How You Slice It

[Problem description](https://adventofcode.com/2018/day/3)

## PHP solution

First some helpers:

```php
final class Point
{
    /**
     * @var int
     */
    private $x;

    /**
     * @var int
     */
    private $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function x(): int
    {
        return $this->x;
    }

    public function y(): int
    {
        return $this->y;
    }
}
```

```php
final class Rectangle
{
    /**
     * @var Point
     */
    private $l;

    /**
     * @var Point
     */
    private $r;

    public function __construct(Point $l, Point $r)
    {
        $this->l = $l;
        $this->r = $r;
    }

    public function l(): Point
    {
        return $this->l;
    }

    public function r(): Point
    {
        return $this->r;
    }

    public function overlaps(self $rectangle): array
    {
        $points = [];
        for ($x = $this->l->x(); $x <= $this->r->x(); ++$x) {
            for ($y = $this->l->y(); $y <= $this->r->y(); ++$y) {
                if ($x >= $rectangle->l()->x() && $y >= $rectangle->l()->y() && $x <= $rectangle->r()->x() && $y <= $rectangle->r()->y()) {
                    $points[] = new Point($x, $y);
                }
            }
        }

        return $points;
    }

    public function isOverlap(self $rectangle): bool
    {
        if ($this->l()->x() > $rectangle->r()->x() || $rectangle->l()->x() > $this->r()->x()) {
            return false;
        }

        if ($this->l()->y() > $rectangle->r()->y() || $rectangle->l()->y() > $this->r()->y()) {
            return false;
        }

        return true;
    }
}
```

Finally:
```php
public function overlaps(array $claims): int
{
    $claims = self::extractClaims($claims);
    $overlaps = array_reduce($claims, function (array $overlaps, Rectangle $rec) use ($claims): array {
        foreach ($claims as $r) {
            if($r === $rec || !$r->isOverlap($rec)) {
                continue;
            }

            $overlaps = array_merge($overlaps, array_map(function(Point $point): string {
                return $point->x().'x'.$point->y();
            }, $r->overlaps($rec)));
        }

        return $overlaps;
    }, []);

    return count(array_unique($overlaps));
}
```

Second:

```php
public function noOverlaps(array $claims): string
{
    $claims = self::extractClaims($claims);
    $noOverlaps = array_reduce($claims, function (array $noOverlaps, Rectangle $rec) use ($claims): array {
        foreach ($claims as $r) {
            if($r->isOverlap($rec) && $r !== $rec) {
                return $noOverlaps;
            }
        }
        $noOverlaps[] = $rec;
        return $noOverlaps;
    }, []);

    return $noOverlaps[0]->l()->x().'x'.$noOverlaps[0]->l()->y();
}
```
