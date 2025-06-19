<?php

require_once __DIR__ . '/vendor/autoload.php';

use Tennis\Presentation\TournamentCli;

$app = new TournamentCli();
$app->run();