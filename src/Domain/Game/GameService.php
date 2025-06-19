<?php declare(strict_types=1);

namespace Tennis\Domain\Game;

use Tennis\Domain\Player\Players;
use Tennis\Domain\Player\Player;

class GameService
{
    private Players $players;
    public function __construct(Players $players)
    {
        $this->players = $players;
    }

    public function start(): Player
    {
              
       if ($this->players->count() < 2) {
            throw new \RuntimeException('Not enough players to start the game.');
        }

        $player1 = $this->players[0];
        $player2 = $this->players[1];

        return $this->determineWinner($player1, $player2);
        
    }

    private function playGame(Player $player): int
    {
        return $player->getSkillLevel() + $player->getExtraPoints();
    }

    private function determineWinner(Player $player1, Player $player2): Player
    {
        $score1 = $this->playGame($player1);
        $score2 = $this->playGame($player2);
        $winner = null;

        if ($score1 > $score2) {
            $winner = $player1;
        } elseif ($score2 > $score1) {
            $winner = $player2;
        } else {
            $winner = array_rand([$player1, $player2]); // Randomly select a winner in case of a tie
        }

        return $winner;
    }
}