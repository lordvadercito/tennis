<?php declare(strict_types=1);

namespace Tennis\Application\Actions;

use Tennis\Domain\Tournament\TournamentService;

class StartTournamentAction
{
    public function __construct(private readonly TournamentService $tournamentService)
    {}

    public function run(): void
    {
        try {
            echo "\nTournament started successfully\n";
            $winner = $this->tournamentService->startTournament();
            echo "\nChampion: " . $winner->getName() . "\n";
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }
}