<?php declare(strict_types=1);

namespace Tennis\Infrastructure\Repositories;

use Tennis\Domain\Player\Players;
use Tennis\Domain\Player\PlayerRepository;
use Tennis\Infrastructure\Mappers\MalePlayerMapper;

class MalePlayerRepository implements PlayerRepository
{
    public function findAll(): Players
    {
        $players = file_get_contents(__DIR__ . '/../Persistence/Json/json_male_player_database.json');

        return  MalePlayerMapper::mapToDomainCollection($players);
    }
}