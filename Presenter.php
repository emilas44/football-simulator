<?php

class Presenter
{
    public static $passedGroup = [];
    public static $passedRoundOf16 = [];
    public static $passedQuarterFinals = [];
    public static $passedSemiFinals = [];
    public static $thirdPlace = [];
    public static $champion = [];

    public static function getSortedGroupTable(array $teams)
    {
        $teams = self::sortTeamsGroupPhase($teams);

        self::$passedGroup[] = $teams[0];
        self::$passedGroup[] = $teams[1];

        foreach ($teams as $key => $team) {
            $key = (int) $key + 1;
            echo "<tr>
                    <td>$key</td>
                    <td>$team->name</td>
                    <td>$team->W</td>
                    <td>$team->D</td>
                    <td>$team->L</td>
                    <td>$team->GF</td>
                    <td>$team->GA</td>
                    <td>$team->GD</td>
                    <td>$team->Pts</td>
                  </tr>";
        }
    }

    public static function styleLoad()
    {
        echo '<link rel="stylesheet" href="style.css">';
    }

    public static function getWinnerRound16(array $teams)
    {
        $teams = self::sortTeamsKoPhase($teams);

        $team = self::teamReset($teams[0]);

        self::$passedRoundOf16[] = $team;
    }

    public static function getWinnerQuarterFinals(array $teams)
    {
        $teams = self::sortTeamsKoPhase($teams);

        $team = self::teamReset($teams[0]);

        self::$passedQuarterFinals[] = $team;
    }

    public static function getWinnerSemiFinals(array $teams)
    {
        $teams = self::sortTeamsKoPhase($teams);

        $team1 = self::teamReset($teams[0]);
        $team2 = self::teamReset($teams[1]);

        self::$passedSemiFinals[] = $team1;
        self::$thirdPlace[] = $team2;
    }

    private static function sortTeamsGroupPhase(array $teams)
    {
        usort($teams, function ($a, $b) {
            if ($a->Pts > $b->Pts) {
                return -1;
            }

            return 1;
        });

        return $teams;
    }

    private static function sortTeamsKoPhase(array $teams)
    {
        usort($teams, function ($a, $b) {
            if (($a->GF + $a->PK) > ($b->GF + $b->PK)) {
                return -1;
            }

            return 1;
        });

        return $teams;
    }

    private static function teamReset(Team $team)
    {
        $team->Pts = 0;
        $team->W = 0;
        $team->D = 0;
        $team->L = 0;
        $team->GF = 0;
        $team->GA = 0;
        $team->GD = 0;
        $team->PK = null;

        return $team;
    }
}