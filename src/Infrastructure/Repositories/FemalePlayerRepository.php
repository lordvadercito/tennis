<?php declare(strict_types=1);

namespace Tennis\Infrastructure\Repositories;

use Tennis\Domain\Player\Players;
use Tennis\Domain\Player\PlayerRepository;
use Tennis\Infrastructure\Mappers\FemalePlayerMapper;

class FemalePlayerRepository implements PlayerRepository
{
    public function findAll(): Players
    {
        $players = file_get_contents(__DIR__ . '/../Persistence/Json/json_female_player_database.json');

        return  FemalePlayerMapper::mapToDomainCollection($players);
    }
}