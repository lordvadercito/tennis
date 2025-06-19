<?php declare(strict_types=1);

namespace Tennis\Domain\Tournament;

use Tennis\Domain\Game\GameService;
use Tennis\Domain\Player\Player;
use Tennis\Domain\Player\Players;
use Tennis\Domain\Player\PlayerRepository;

class TournamentService
{
    public function __construct(private PlayerRepository $playerRepository){}

    public function startTournament(): Player
    {
        $players = $this->playerRepository->findAll();

        if ($players->count() < 2) {
            throw new \Exception('Not enough players to start the tournament.');
        }

        $currentRound = $players;
        while ($currentRound->count() > 1) {
            $currentRound = $this->playRound($currentRound);
        }

        return $currentRound[0]; // The last remaining player is the tournament winner
    }

    private function playRound(Players $players): Players
    {
        $winners = new Players();

        for ($i = 0; $i < $players->count(); $i += 2) {
            if ($i + 1 < $players->count()) {
                $roundPlayers = new Players();
                $roundPlayers[] = $players[$i];
                $roundPlayers[] = $players[$i + 1];
              
                echo "\nPlaying match between {$roundPlayers[0]->getName()} and {$roundPlayers[1]->getName()}\n";
                
                $winner = new GameService($roundPlayers)->start(); // Start the game between two players

                echo "\nWinner: {$winner->getName()}\n";
                
                $winners[] = $winner; // Store the winner in the winners collection
            } else {
                // If there's an odd player out, they automatically advance to the next round
                $winners[] = $players[$i];
            }
        }

        return $winners;
    }
}