<?php

class Presenter
{
    public static function getSortedGroupTable(array $teams)
    {
        usort($teams, function ($a, $b) {
            if ($a->Pts > $b->Pts) {
                return -1;
            }

            return 1;
        });

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
}