<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Tennis\Domain\Player\FemalePlayer;

class FemalePlayerTest extends TestCase
{
    /**
     * @covers \Tennis\Domain\Player\FemalePlayer::__construct
     * @covers \Tennis\Domain\Player\Player::__construct
     * @covers \Tennis\Domain\Player\Player::getName
     * @covers \Tennis\Domain\Player\Player::getSkillLevel
     * @covers \Tennis\Domain\Player\FemalePlayer::getReactionTime
     */
    public function testConstructorSetsProperties()
    {
        $player = new FemalePlayer('Serena', 90, 15);
        $this->assertSame('Serena', $player->getName());
        $this->assertSame(90, $player->getSkillLevel());
        $this->assertSame(15, $player->getReactionTime());
    }

    /**
     * @covers \Tennis\Domain\Player\FemalePlayer::getReactionTime
     */
    public function testGetReactionTimeReturnsCorrectValue()
    {
        $player = new FemalePlayer('Venus', 85, 20);
        $this->assertEquals(20, $player->getReactionTime());
    }

    /**
     * @covers \Tennis\Domain\Player\FemalePlayer::getExtraPoints
     * @covers \Tennis\Domain\Player\Player::getLuckyNumber
     */
    public function testGetExtraPointsReturnsSumOfReactionTimeAndLuckyNumber()
    {
        // Create a stub for FemalePlayer to override getLuckyNumber
        $stub = $this->getMockBuilder(FemalePlayer::class)
            ->setConstructorArgs(['Naomi', 80, 10])
            ->onlyMethods(['getLuckyNumber'])
            ->getMock();

        $stub->method('getLuckyNumber')->willReturn(7);

        $this->assertEquals(17, $stub->getExtraPoints());
    }
}