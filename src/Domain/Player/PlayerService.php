<?php declare(strict_types=1);

namespace Tennis\Domain\Player;

class PlayerService
{
    private PlayerRepository $repository;

    public function __construct(PlayerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllPlayers(): Players
    {
        return $this->repository->findAll();
    }
}