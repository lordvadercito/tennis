<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Tennis\Domain\Player\PlayerService;
use Tennis\Domain\Player\PlayerRepository;
use Tennis\Domain\Player\Players;

class PlayerServiceTest extends TestCase
{
    /**
     * @covers \Tennis\Domain\Player\PlayerService::__construct
     * @covers \Tennis\Domain\Player\PlayerService::getAllPlayers
     */
    public function testGetAllPlayersReturnsPlayers()
    {
        $playersMock = $this->createMock(Players::class);

        $repositoryMock = $this->createMock(PlayerRepository::class);
        $repositoryMock->expects($this->once())
            ->method('findAll')
            ->willReturn($playersMock);

        $service = new PlayerService($repositoryMock);

        $this->assertSame($playersMock, $service->getAllPlayers());
    }
}