use PHPUnit\Framework\TestCase;
use Tennis\Domain\Player\FemalePlayer;

<?php declare(strict_types=1);


// Assuming Player is in the same namespace and is autoloaded
class FemalePlayerTest extends TestCase
{
    public function testConstructorSetsProperties()
    {
        $player = new FemalePlayer('Serena', 95, 80);
        $this->assertSame('Serena', $player->getName());
        $this->assertSame(95, $player->getSkillLevel());
        $this->assertSame(80, $player->getReactionTime());
    }

    public function testGetReactionTimeReturnsCorrectValue()
    {
        $player = new FemalePlayer('Venus', 90, 70);
        $this->assertEquals(70, $player->getReactionTime());
    }

    public function testGetExtraPointsReturnsSumOfReactionTimeAndLuckyNumber()
    {
        // Create a stub for FemalePlayer to mock getLuckyNumber
        $stub = $this->getMockBuilder(FemalePlayer::class)
            ->setConstructorArgs(['Naomi', 88, 60])
            ->onlyMethods(['getLuckyNumber'])
            ->getMock();

        $stub->method('getLuckyNumber')->willReturn(7);

        $this->assertEquals(67, $stub->getExtraPoints());
    }

    public function testFemalePlayerIsInstanceOfPlayer()
    {
        $player = new FemalePlayer('Iga', 92, 75);
        $this->assertInstanceOf(\Tennis\Domain\Player\Player::class, $player);
    }
}