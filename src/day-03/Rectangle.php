<?php

declare(strict_types=1);

namespace AdventOfCode\Day3;

/**
 * ..l........
 * ...#####...
 * ...#####...
 * ........r..
 */
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
