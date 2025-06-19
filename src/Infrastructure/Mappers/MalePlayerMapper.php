<?php declare(strict_types=1);

namespace Tennis\Infrastructure\Mappers;

use Tennis\Domain\Player\MalePlayer;
use Tennis\Domain\Player\Players;

class MalePlayerMapper
{
    public static function mapToDomain(array $data): MalePlayer
    {
        return new MalePlayer(
            $data['name'],
            $data['skillLevel'],
            $data['strength'],
            $data['speed']
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