<?php

class Game
{
    /**
     * THIS IS THE MAIN FUNCTION THAT SIMULATES THE GAME
     *
     * @param $team1
     * @param $team2
     */
    public static function simulate($team1, $team2)
    {
        global $PK, $comment;

        // declaring variables
        $t1pow = $team1->overall - 17;              // 17 is a coefficient that gives (for football) normal result
        $t2pow = $team2->overall - 17;
        $t1goal = 0;
        $t2goal = 0;
        $team1HasBall = null;
        $team2HasBall = null;
        $ballPosition = null;


        foreach (self::whoHasBall($team1, $team2) as $key => $value) {
            $$key = $value;
        }

        //self::events($team1HasBall, $team2HasBall, $ballPosition, $comment);

        ///////////////////////////////// SIMULATING GAME /////////////////////////////////////
        for ($i = 1; $i <= 90; $i++) {
            echo $comment ? $i.'<br>' : '';
            //******************************* While team1 has the ball ************************************//
            while ($team1HasBall) {
                $r1 = rand(1, 100);

                foreach (
                    self::team1Event(
                        $r1,
                        $t1pow,
                        $t1goal,
                        $ballPosition,
                        $team1HasBall,
                        $team2HasBall
                    ) as $key => $value) {
                    $$key = $value;
                }
            } // end of team1 has the ball

            //******************************* While team2 has the ball ************************************//
            while ($team2HasBall) {
                $r2 = rand(1, 100);

                foreach (
                    self::team2Event(
                        $r2,
                        $t2pow,
                        $t1goal,
                        $ballPosition,
                        $team1HasBall,
                        $team2HasBall
                    ) as $key => $value) {
                    $$key = $value;
                }
            } // end of team2 has the ball
        } // end of 90 iteration

        $team1->GF += $t1goal;                    // adding scored goals and recieved goals for both teams
        $team2->GF += $t2goal;
        $team1->GA += $t2goal;
        $team2->GA += $t1goal;

        if ($t1goal > $t2goal) {                  // adding points if $team1 wins
            $team1->Pts += 3;
            $team1->W += 1;
            $team2->L += 1;
        } else if ($t1goal < $t2goal) {           // adding points if $team2 wins
            $team2->Pts += 3;
            $team2->W += 1;
            $team1->L += 1;
        } else {                                  // adding points if it's draw
            $team1->D += 1;
            $team2->D += 1;
            $team1->Pts += 1;
            $team2->Pts += 1;
        }

        if ($PK) {
            // if game ends with draw, winner is decided with penalty shoot-out
            self::penaltyKicksShootout($t1goal, $t2goal);
        }
    } // end of function

    /**
     * Decides which team has the ball first
     *
     * @param $team1
     * @param $team2
     * @return array
     */
    public static function whoHasBall($team1, $team2) {
        global $comment;

        // deciding who has the ball first
        $coinToss = rand(1, 2);
        if ($coinToss == 1) {
            $comment == false ? '' : print($team1->name . " has the ball<br>");
            return [
                'team1HasBall' => true,
                'team2HasBall' => false,
                'ballPosition' => 5

            ];
        } else {
            $comment == false ? '' : print($team2->name . " has the ball<br>");
            return [
                'team1HasBall' => false,
                'team2HasBall' => true,
                'ballPosition' => -5
            ];
        } // end of if coin toss
    }

    /**
     * Team1 event while it has the ball
     *
     * @param $r1
     * @param $t1pow
     * @param $t1goal
     * @param $ballPosition
     * @param $team1HasBall
     * @param $team2HasBall
     * @return array
     */
    public static function team1Event($r1, $t1pow, $t1goal, $ballPosition, $team1HasBall, $team2HasBall)
    {
        if ($r1 < $t1pow) {

            self::comments($ballPosition, 'if');

            $scoredGoal = [];
            if ($ballPosition == 1) {
                $scoredGoal['t1goal'] = $t1goal + 1;
                $team1HasBall = false;
                $team2HasBall = true;
            }

            return array_merge([
                'team1HasBall'  => $team1HasBall,
                'team2HasBall'  => $team2HasBall,
                'ballPosition'  => $ballPosition == 1 ? -10 : ($ballPosition - 1),
            ], $scoredGoal);
        } else {

            self::comments($ballPosition, 'else');

            return [
                'team1HasBall'  => !$team1HasBall,
                'team2HasBall'  => !$team2HasBall,
                'ballPosition'  => -10,
            ];
        }
    }

    /**
     * Team2 event while it has the ball
     *
     * @param $r2
     * @param $t2pow
     * @param $t2goal
     * @param $ballPosition
     * @param $team1HasBall
     * @param $team2HasBall
     * @return array
     */
    public static function team2Event($r2, $t2pow, $t2goal, $ballPosition, $team1HasBall, $team2HasBall)
    {
        if ($r2 < $t2pow) {

            self::comments($ballPosition, 'if');

            $scoredGoal = [];
            if ($ballPosition == -1) {
                $scoredGoal['t2goal'] = $t2goal + 1;
                $team1HasBall = true;
                $team2HasBall = false;
            }

            return array_merge([
                'team1HasBall'  => $team1HasBall,
                'team2HasBall'  => $team2HasBall,
                'ballPosition'  => $ballPosition == -1 ? 10 : ($ballPosition + 1),
            ], $scoredGoal);
        } else {

            self::comments($ballPosition, 'else');

            return [
                'team1HasBall'  => !$team1HasBall,
                'team2HasBall'  => !$team2HasBall,
                'ballPosition'  => 10,
            ];
        }
    }

    /**
     * Prints comment dependable on ball position and Team event
     *
     * @param $ballPosition
     * @param $ifElse
     */
    public static function comments($ballPosition, $ifElse) {

        global $team1, $team2, $comment;

        $comments = [
            '10' => [
                'if' => $comment ? $team1->name . " starts the attack<br>" : '',
                'else' => $comment ? "Recounter, " . $team2->name . " starts new attack<br>" : ''
            ],
            '-10' => [
                'if' => $comment ? $team2->name . " starts the attack<br>" : '',
                'else' => $comment ? "Recounter, " . $team1->name . " starts new attack<br>" : ''
            ],
            '9' => [
                'if' => $comment ? $team1->name . " passes the ball<br>" : '',
                'else' => $comment ? "Recounter, " . $team2->name . " starts new attack<br>" : ''
            ],
            '-9' => [
                'if' => $comment ? $team2->name . " passes the ball<br>" : '',
                'else' => $comment ? "Recounter, " . $team1->name . " starts new attack<br>" : ''
            ],
            '8' => [
                'if' => $comment ? $team1->name . " passes the ball<br>" : '',
                'else' => $comment ? "Recounter, " . $team2->name . " starts new attack<br>" : ''
            ],
            '-8' => [
                'if' => $comment ? $team2->name . " passes the ball<br>" : '',
                'else' => $comment ? "Recounter, " . $team1->name . " starts new attack<br>" : ''
            ],
            '7' => [
                'if' => $comment ? $team1->name . " tries a long pass<br>" : '',
                'else' => $comment ? "Recounter, " . $team2->name . " starts new attack<br>" : ''
            ],
            '-7' => [
                'if' => $comment ? $team2->name . " tries a long pass<br>" : '',
                'else' => $comment ? "Recounter, " . $team1->name . " starts new attack<br>" : ''
            ],
            '6' => [
                'if' => $comment ? $team1->name . " is dribbling the ball<br>" : '',
                'else' => $comment ? "Recounter, " . $team2->name . " starts new attack<br>" : ''
            ],
            '-6' => [
                'if' => $comment ? $team2->name . " is dribbling the ball<br>" : '',
                'else' => $comment ? "Recounter, " . $team1->name . " starts new attack<br>" : ''
            ],
            '5' => [
                'if' => $comment ? $team1->name . " is dribbling the ball<br>" : '',
                'else' => $comment ? "Recounter, " . $team2->name . " starts new attack<br>" : ''
            ],
            '-5' => [
                'if' => $comment ? $team2->name . " is dribbling the ball<br>" : '',
                'else' => $comment ? "Recounter, " . $team1->name . " starts new attack<br>" : ''
            ],
            '4' => [
                'if' => $comment ? $team1->name . " tries to change side<br>" : '',
                'else' => $comment ? "Recounter, " . $team2->name . " starts new attack<br>" : ''
            ],
            '-4' => [
                'if' => $comment ? $team2->name . " tries to change side<br>" : '',
                'else' => $comment ? "Recounter, " . $team1->name . " starts new attack<br>" : ''
            ],
            '3' => [
                'if' => $comment ? $team1->name . " has made an excellent pass!<br>" : '',
                'else' => $comment ? "Recounter, " . $team2->name . " starts new attack<br>" : ''
            ],
            '-3' => [
                'if' => $comment ? $team2->name . " has made an excellent pass!<br>" : '',
                'else' => $comment ? "Recounter, " . $team1->name . " starts new attack<br>" : ''
            ],
            '2' => [
                'if' => $comment ? "It's a chance, " . $team1->name . " is shooting!!<br>" : '',
                'else' => $comment ? $team2->name . " has blocked the ball<br>" : ''
            ],
            '-2' => [
                'if' => $comment ? "It's a chance, " . $team2->name . " is shooting!!<br>" : '',
                'else' => $comment ? $team1->name . " has blocked the ball<br>" : ''
            ],
            '1' => [
                'if' => $comment ? $team1->name . " has scored a GOOOOOOOAAAAAL!!!<br>" : '',
                'else' => $comment ? "WOW a great save from " . $team2->name . " goalkeeper<br>" : ''
            ],
            '-1' => [
                'if' => $comment ? $team2->name . " has scored a GOOOOOOOAAAAAL!!!<br>" : '',
                'else' => $comment ? "WOW a great save from " . $team1->name . " goalkeeper<br>" : ''
            ]
        ];

        echo $comments[$ballPosition][$ifElse];
    }

    /**
     * If simulate() function has $PK = true then
     *  the winner will be decided on PK shootout
     *
     * @param $t1goal
     * @param $t2goal
     */
    public static function penaltyKicksShootout($t1goal, $t2goal)
    {
        global $team1, $team2, $comment;

        if ($t1goal == $t2goal) {
            $comment == false ? '' : print("Penalty shoot-out<br>");
            $pk1 = 0;
            $pk2 = 0;

            $pk1 = self::teamShooting($pk1, $team1);
            $pk2 = self::teamShooting($pk2, $team2);

            $team1->PK = $pk1;
            $team2->PK = $pk2;

            $comment == false ? '' : print("Final score after penalties: " . $team1->name . " " . $t1goal . "(" . $team1->PK . ")" . ":" . "(" . $team2->PK . ")" . $t2goal . " " . $team2->name . "<br>");

            // if the score after first series of 5 shots is draw then we have Sudden death
            if ($pk1 == $pk2) {
                self::suddenDeath($t1goal, $t2goal, $pk1, $pk2);
            } // end of Sudden death
        } // end of penalty shoot-out
    }

    /**
     * Called for single team penalty kicks
     * returns number of scored goals
     *
     * @param $pk
     * @param $team
     * @return mixed
     */
    public static function teamShooting($pk, $team)
    {
        global $comment;

        for ($i = 1; $i <= 5; $i++) {
            $pkr = rand(1, 10);
            if ($pkr <= 5) {
                $comment ? print($i . ": " . $team->name . " has scored!<br>") : '';
                $pk++;
            } else {
                $comment ? print($i . ": " . $team->name . " missed :(<br>") : '';
            }
        }

        return $pk;
    }

    /**
     * If score is draw after penalties
     * the winner will be decided with sudden death
     *
     * @param $t1goal
     * @param $t2goal
     * @param $pk1
     * @param $pk2
     */
    public static function suddenDeath($t1goal, $t2goal, $pk1, $pk2)
    {
        global $team1, $team2, $comment;

        $comment ? print("It's draw! The winner will be decided with - Sudden death<br>") : '';
        while ($pk1 == $pk2) {
            $sdr1 = rand(1, 10);
            $sdr2 = rand(1, 10);
            if ($sdr1 > 5 && $sdr2 > 5) {
                $comment ? print($team1->name . " has scored!<br>") : '';
                $comment ? print($team2->name . " has scored!<br>") : '';
                $pk1 += 1;
                $pk2 += 1;
            } else if ($sdr1 >= 5 && $sdr2 <= 5) {
                $comment ? print($team1->name . " has scored!<br>") : '';
                $comment ? print($team2->name . " missed :(<br>") : '';
                $pk1 += 1;
            } else if ($sdr1 <= 5 && $sdr2 >= 0.5) {
                $comment ? print($team1->name . " missed :(<br>") : '';
                $comment ? print($team2->name . " has scored!<br>") : '';
                $pk2 += 1;
            }
        } // end of sudden death

        $team1->PK = $pk1;
        $team2->PK = $pk2;

        // printout final score after Sudden death
        $comment == false ? '' : print("Final score after Sudden death: " . $team1->name . " " . $t1goal . "(" . $team1->PK . ")" . ":" . "(" . $team2->PK . ")" . $t2goal . " " . $team2->name . "<br>");
    }
}