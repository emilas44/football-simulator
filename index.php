<?php

require('setup.php');
require('Game.php');
require('Presenter.php');

Presenter::styleLoad();

global $comment, $PK;

/**
 * GROUP STAGE
 */
$comment = false;
$PK = false;
$groupLetters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];

foreach ($groupLetters as $groupLetter) {
    include("GroupStage/group{$groupLetter}.php");
}

$comment = false;
$PK = true;

/**
 * ROUND OF 16
 */
include 'RoundOf16/matches.php';
/**
 * QUARTER FINALS
 */
include 'QuarterFinals/matches.php';
/**
 * SEMI FINALS
 */
include 'SemiFinals/matches.php';
/**
 * FINAL
 */
include 'Final/matches.php';

include 'javascript.html';