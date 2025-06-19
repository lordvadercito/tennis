<?php declare(strict_types=1);

namespace Tennis\Domain\Player;

interface PlayerRepository
{
    /**
     * @return Players
     */
    public function findAll(): Players;
}