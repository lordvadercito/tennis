<?php declare(strict_types=1);

namespace Tennis\Domain\Player;

class FemalePlayer extends Player
{
    private int $reactionTime;

    public function __construct(string $name, int $skillLevel, int $reactionTime)
    {
        parent::__construct($name, $skillLevel);
        $this->reactionTime = $reactionTime;
    }

    public function getReactionTime(): int
    {
        return $this->reactionTime;
    }

    public function getExtraPoints(): int
    {
        return $this->reactionTime + $this->getLuckyNumber();
    }
}