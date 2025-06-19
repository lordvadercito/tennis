<?php declare(strict_types=1);

namespace Tennis\Presentation;

use Tennis\Application\Actions\StartTournamentActionFactory;

class TournamentCli
{
    public function run(): void
    {
        echo "---------------------------------------\n";
        echo "Welcome to the Tennis Tournament CLI\n";
        echo "---------------------------------------\n";
        echo "\n";
        echo "Select the tournament type (male/female): ";
        $typeInput = strtolower(trim(readline()));

        try {
            $action = StartTournamentActionFactory::create($typeInput);
            $action->run();
        } catch (\InvalidArgumentException $e) {
            echo $e->getMessage() . "\n";
            exit(1);
        }
    }
}