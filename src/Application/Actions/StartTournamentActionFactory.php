<?php declare(strict_types=1);

namespace Tennis\Application\Actions;

use Tennis\Domain\Tournament\TournamentService;
use Tennis\Infrastructure\Repositories\MalePlayerRepository;
use Tennis\Infrastructure\Repositories\FemalePlayerRepository;

class StartTournamentActionFactory
{
    public static function create(string $type): StartTournamentAction
    {
        if ($type === 'male') {
            $playerRepository = new MalePlayerRepository();
        } elseif ($type === 'female') {
            $playerRepository = new FemalePlayerRepository();
        } else {
            throw new \InvalidArgumentException("Invalid tournament type");
        }

        $tournamentService = new TournamentService($playerRepository);
        return new StartTournamentAction($tournamentService);
    }
}