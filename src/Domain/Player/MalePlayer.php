<?php declare(strict_types=1);

namespace Tennis\Domain\Player;

class MalePlayer extends Player
{
    private int $strength;
    private int $speed;

    public function __construct(string $name, int $skillLevel, int $strength, int $speed)
    {
        parent::__construct($name, $skillLevel);
        $this->strength = $strength;
        $this->speed = $speed;
    }
    public function getStrength(): int
    {
        return $this->strength;
    }
    public function getSpeed(): int
    {
        return $this->speed;
    }

    public function getExtraPoints(): int
    {
        return $this->strength + $this->speed + $this->getLuckyNumber();
    }
}