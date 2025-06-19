<?php declare(strict_types=1);

namespace Tennis\Domain\Player;

abstract class Player
{
    private string $name;
    private int $skillLevel;
    private int $luckyNumber;

    public function __construct(string $name, int $skillLevel)
    {
        $this->name = $name;
        $this->skillLevel = $skillLevel;
        $this->luckyNumber = random_int(1, 100);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSkillLevel(): int
    {
        return $this->skillLevel;
    }

    public function getLuckyNumber(): int
    {
        return $this->luckyNumber;
    }

    abstract public function getExtraPoints(): int;
}
