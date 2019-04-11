<?php

class Presenter
{
    public static $passedGroup = [];
    public static $passedRoundOf16 = [];
    public static $passedQuarterFinals = [];
    public static $passedSemiFinals = [];
    public static $thirdPlace = [];
    public static $champion = [];

    /**
     * @param array $teams
     */
    public static function getSortedGroupTable(array $teams): void
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

    public static function styleLoad(): void
    {
        echo '<link rel="stylesheet" href="style.css">';
    }

    /**
     * @param array $teams
     */
    public static function getWinnerRound16(array $teams): void
    {
        $teams = self::sortTeamsKoPhase($teams);

        self::$passedRoundOf16[] = $teams[0];
    }

    /**
     * @param array $teams
     */
    public static function getWinnerQuarterFinals(array $teams): void
    {
        $teams = self::sortTeamsKoPhase($teams);

        self::$passedQuarterFinals[] = $teams[0];
    }

    /**
     * @param array $teams
     */
    public static function getWinnerSemiFinals(array $teams): void
    {
        $teams = self::sortTeamsKoPhase($teams);

        self::$passedSemiFinals[] = $teams[0];
        self::$thirdPlace[] = $teams[1];
    }

    /**
     * @param array $teams
     * @return array
     */
    private static function sortTeamsGroupPhase(array $teams): array
    {
        usort($teams, function ($a, $b) {
            if ($a->Pts > $b->Pts){
                return -1;
            }

            if(($a->Pts === $b->Pts) && ($a->GD > $b->GD)){
                return -1;
            }

            if(($a->Pts === $b->Pts) && ($a->GD === $b->GD) && ($a->GF > $b->GF)){
                return -1;
            }

            return 1;
        });

        return $teams;
    }

    /**
     * @param array $teams
     * @return array
     */
    private static function sortTeamsKoPhase(array $teams): array
    {
        usort($teams, function ($a, $b) {
            if (($a->GF > $b->GF) || ($a->PK > $b->PK)){
                return -1;
            }

            return 1;
        });

        return $teams;
    }

    /**
     * @param array $teams
     * @return array
     */
    public static function teamsReset(array $teams): array
    {
        foreach ($teams as $team) {
            $team->Pts = 0;
            $team->W = 0;
            $team->D = 0;
            $team->L = 0;
            $team->GF = 0;
            $team->GA = 0;
            $team->GD = 0;
            $team->PK = null;
        }

        return $teams;
    }
}