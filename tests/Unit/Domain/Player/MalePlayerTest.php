<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Tennis\Domain\Player\MalePlayer;

class MalePlayerTest extends TestCase
{
    /**
     * @covers \Tennis\Domain\Player\MalePlayer::__construct
     * @covers \Tennis\Domain\Player\Player::__construct
     * @covers \Tennis\Domain\Player\Player::getName
     * @covers \Tennis\Domain\Player\Player::getSkillLevel
     * @covers \Tennis\Domain\Player\MalePlayer::getStrength
     * @covers \Tennis\Domain\Player\MalePlayer::getSpeed
     */
    public function testConstructorSetsProperties()
    {
        $player = new MalePlayer('Roger', 95, 80, 85);
        $this->assertSame('Roger', $player->getName());
        $this->assertSame(95, $player->getSkillLevel());
        $this->assertSame(80, $player->getStrength());
        $this->assertSame(85, $player->getSpeed());
    }

    /**
     * @covers \Tennis\Domain\Player\MalePlayer::getStrength
     */
    public function testGetStrengthReturnsCorrectValue()
    {
        $player = new MalePlayer('Rafa', 90, 88, 82);
        $this->assertEquals(88, $player->getStrength());
    }

    /**
     * @covers \Tennis\Domain\Player\MalePlayer::getSpeed
     */
    public function testGetSpeedReturnsCorrectValue()
    {
        $player = new MalePlayer('Novak', 92, 78, 90);
        $this->assertEquals(90, $player->getSpeed());
    }

    /**
     * @covers \Tennis\Domain\Player\MalePlayer::getExtraPoints
     * @covers \Tennis\Domain\Player\Player::getLuckyNumber
     */
    public function testGetExtraPointsReturnsSumOfStrengthSpeedAndLuckyNumber()
    {
        $stub = $this->getMockBuilder(MalePlayer::class)
            ->setConstructorArgs(['Andy', 85, 70, 75])
            ->onlyMethods(['getLuckyNumber'])
            ->getMock();

        $stub->method('getLuckyNumber')->willReturn(5);

        $this->assertEquals(70 + 75 + 5, $stub->getExtraPoints());
    }
}