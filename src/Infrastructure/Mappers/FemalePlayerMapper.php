<?php declare(strict_types=1);

namespace Tennis\Infrastructure\Mappers;

use Tennis\Domain\Player\FemalePlayer;
use Tennis\Domain\Player\Players;

class FemalePlayerMapper
{
    public static function mapToDomain(array $data): FemalePlayer
    {
        return new FemalePlayer(
            $data['name'],
            $data['skillLevel'],
            $data['reactionTime']
        );
    }

    public static function mapToDomainCollection(string $players): Players
    {
        $players = json_decode($players, true);
        return self::mapToDomainFromArray($players['data']);
    }

    public static function mapToDomainFromArray(array $players): Players
	{
		$players = array_map([self::class, 'mapToDomain'], $players);

		return new Players($players);
	}
}