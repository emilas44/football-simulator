<?php

require_once('setup.php');
require_once('Team.php');
require_once('Game.php');



$team1 = new Team($teams[3]);
$team2 = new Team($teams[8]);



Game::simulate($team1, $team2, false, true);

print("Final score: " . $team1->name . " " . $team1->GF . ":" . $team2->GF . " " . $team2->name . "<br>");

var_dump($team1, $team2);