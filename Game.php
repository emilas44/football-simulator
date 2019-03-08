<?php

class Game
{
    public static function whoHasBall($team1, $team2, $comment) {
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

    public static function team1Event($r1, $t1pow, $t1goal, $ballPosition, $team1HasBall, $team2HasBall, $comments)
    {
        if ($r1 < $t1pow) {

            if ($comments) {
                print($comments['if']);
            } else {
                comments($ballPosition, 'if');
            }
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

            if ($comments) {
                print($comments['else']);
            } else {
                comments($ballPosition, 'else');
            }

            return [
                'team1HasBall'  => !$team1HasBall,
                'team2HasBall'  => !$team2HasBall,
                'ballPosition'  => -10,
            ];
        }
    }

    public static function team2Event($r2, $t2pow, $t2goal, $ballPosition, $team1HasBall, $team2HasBall, $comments)
    {
        if ($r2 < $t2pow) {

            if ($comments) {
                print($comments['if']);
            } else {
                comments($ballPosition, 'if');
            }

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

            if ($comments) {
                print($comments['else']);
            } else {
                comments($ballPosition, 'else');
            }

            return [
                'team1HasBall'  => !$team1HasBall,
                'team2HasBall'  => !$team2HasBall,
                'ballPosition'  => 10,
            ];
        }
    }

    public static function simulate($team1, $team2, $PK = false, $comment = false)
    {
        // declaring variables
        $t1pow = $team1->overall - 17;              // 17 is a coefficient that gives (for football) normal result
        $t2pow = $team2->overall - 17;
        $t1goal = 0;
        $t2goal = 0;
        $team1HasBall = null;
        $team2HasBall = null;
        $ballPosition = null;


        foreach (self::whoHasBall($team1, $team2, $comment) as $key => $value) {
            $$key = $value;
        }

        //self::events($team1HasBall, $team2HasBall, $ballPosition, $comment);

        ///////////////////////////////// SIMULATING GAME /////////////////////////////////////
        for ($i = 1; $i <= 90; $i++) {
            //******************************* While team1 has the ball ************************************//
            while ($team1HasBall) {
                $r1 = rand(1, 100);

                switch ($ballPosition) {

                    case 10:
//                        $comments = [
//                            'if' => $comment == false ? '' : $team1->name . " starts the attack<br>",
//                            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
//                        ];


                        foreach (
                            self::team1Event(
                                $r1,
                                $t1pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments = false
                            ) as $key => $value) {
                            $$key = $value;
                        }
                        break;
                    case 9:
                        $comments = [
                            'if' => $comment == false ? '' : $team1->name . " passes the ball<br>",
                            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
                        ];
                        foreach (
                            self::team1Event(
                                $r1,
                                $t1pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments
                            ) as $key => $value) {
                            $$key = $value;
                        }
                        break;
                    case 8:
                        $comments = [
                            'if' => $comment == false ? '' : $team1->name . " passes the ball<br>",
                            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
                        ];
                        foreach (
                            self::team1Event(
                                $r1,
                                $t1pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments
                            ) as $key => $value) {
                            $$key = $value;
                        }
                        break;
                    case 7:
                        $comments = [
                            'if' => $comment == false ? '' : $team1->name . " tries a long pass<br>",
                            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
                        ];
                        foreach (
                            self::team1Event(
                                $r1,
                                $t1pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments
                            ) as $key => $value) {
                            $$key = $value;
                        }
                        break;
                    case 6:
                        $comments = [
                            'if' => $comment == false ? '' : $team1->name . " is dribbling the ball<br>",
                            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
                        ];
                        foreach (
                            self::team1Event(
                                $r1,
                                $t1pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments
                            ) as $key => $value) {
                            $$key = $value;
                        }
                        break;
                    case 5:
                        $comments = [
                            'if' => $comment == false ? '': $team1->name . " is dribbling the ball<br>",
                            'else' => $comment == false ? '': "Recounter, " . $team2->name . " starts new attack<br>"
                        ];
                        foreach (
                            self::team1Event(
                                $r1,
                                $t1pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments
                            ) as $key => $value) {
                            $$key = $value;
                        }
                        break;
                    case 4:
                        $comments = [
                            'if' => $comment == false ? '' : $team1->name . " tries to change side<br>",
                            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
                        ];
                        foreach (
                            self::team1Event(
                                $r1,
                                $t1pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments
                            ) as $key => $value) {
                            $$key = $value;
                        }
                        break;
                    case 3:
                        $comments = [
                            'if' => $comment == false ? '' : $team1->name . " has made an excellent pass!<br>",
                            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
                        ];
                        foreach (
                            self::team1Event(
                                $r1,
                                $t1pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments
                            ) as $key => $value) {
                            $$key = $value;
                        }
                        break;
                    case 2:
                        $comments = [
                            'if' => $comment == false ? '' : "It's a chance, " . $team1->name . " is shooting!!<br>",
                            'else' => $comment == false ? '' : $team2->name . " has blocked the ball<br>"
                        ];
                        foreach (
                            self::team1Event(
                                $r1,
                                $t1pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments
                            ) as $key => $value) {
                            $$key = $value;
                        }
                        break;
                    case 1:
                        $comments = [
                            'if' => $comment == false ? '' : $team1->name . " has scored a GOOOOOOOAAAAAL!!!<br>",
                            'else' => $comment == false ? '' : "WOW a great save from " . $team2->name . " goalkeeper<br>"
                        ];
                        foreach (
                            self::team1Event(
                                $r1,
                                $t1pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments
                            ) as $key => $value) {
                            $$key = $value;
                        }
                }
            } // end of team1 has the ball

            //******************************* While team2 has the ball ************************************//
            while ($team2HasBall) {
                $r2 = rand(1, 100);

                switch ($ballPosition) {

                    case -10:
//                        $comments = [
//                            'if' => $comment == false ? '' : $team1->name . " starts the attack<br>",
//                            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
//                        ];
                        foreach (
                            self::team2Event(
                                $r2,
                                $t2pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments = false
                            ) as $key => $value) {
                            $$key = $value;
                        }
                        break;
                    case -9:
                        $comments = [
                            'if' => $comment == false ? '' : $team1->name . " passes the ball<br>",
                            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
                        ];
                        foreach (
                            self::team2Event(
                                $r2,
                                $t2pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments
                            ) as $key => $value) {
                            $$key = $value;
                        }
                        break;
                    case -8:
                        $comments = [
                            'if' => $comment == false ? '' : $team1->name . " passes the ball<br>",
                            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
                        ];
                        foreach (
                            self::team2Event(
                                $r2,
                                $t2pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments
                            ) as $key => $value) {
                            $$key = $value;
                        }
                        break;
                    case -7:
                        $comments = [
                            'if' => $comment == false ? '' : $team1->name . " tries a long pass<br>",
                            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
                        ];
                        foreach (
                            self::team2Event(
                                $r2,
                                $t2pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments
                            ) as $key => $value) {
                            $$key = $value;
                        }
                        break;
                    case -6:
                        $comments = [
                            'if' => $comment == false ? '' : $team1->name . " is dribbling the ball<br>",
                            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
                        ];
                        foreach (
                            self::team2Event(
                                $r2,
                                $t2pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments
                            ) as $key => $value) {
                            $$key = $value;
                        }
                        break;
                    case -5:
                        $comments = [
                            'if' => $comment == false ? '' : $team1->name . " is dribbling the ball<br>",
                            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
                        ];
                        foreach (
                            self::team2Event(
                                $r2,
                                $t2pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments
                            ) as $key => $value) {
                            $$key = $value;
                        }
                        break;
                    case -4:
                        $comments = [
                            'if' => $comment == false ? '' : $team1->name . " tries to change side<br>",
                            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
                        ];
                        foreach (
                            self::team2Event(
                                $r2,
                                $t2pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments
                            ) as $key => $value) {
                            $$key = $value;
                        }
                        break;
                    case -3:
                        $comments = [
                            'if' => $comment == false ? '' : $team1->name . " has made an excellent pass!<br>",
                            'else' => $comment == false ? '' : "Recounter, " . $team2->name . " starts new attack<br>"
                        ];
                        foreach (
                            self::team2Event(
                                $r2,
                                $t2pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments
                            ) as $key => $value) {
                            $$key = $value;
                        }
                        break;
                    case -2:
                        $comments = [
                            'if' => $comment == false ? '' : "It's a chance, " . $team1->name . " is shooting!!<br>",
                            'else' => $comment == false ? '' : $team2->name . " has blocked the ball<br>"
                        ];
                        foreach (
                            self::team2Event(
                                $r2,
                                $t2pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments
                            ) as $key => $value) {
                            $$key = $value;
                        }
                        break;
                    case -1:
                        $comments = [
                            'if' => $comment == false ? '' : $team1->name . " has scored a GOOOOOOOAAAAAL!!!<br>",
                            'else' => $comment == false ? '' : "WOW a great save from " . $team2->name . " goalkeeper<br>"
                        ];
                        foreach (
                            self::team2Event(
                                $r2,
                                $t2pow,
                                $t1goal,
                                $ballPosition,
                                $team1HasBall,
                                $team2HasBall,
                                $comments
                            ) as $key => $value) {
                            $$key = $value;
                        }
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

        if ($PK)
            // if game ends with draw, winner is decided with penalty shoot-out
            if ($t1goal == $t2goal){
                $comment == false ? '' : print("Penalty shoot-out<br>");
                $pk1 = 0;
                $pk2 = 0;

                for ($i = 1; $i <= 5; $i++){
                    $pkr = rand(1, 10);
                    if ($pkr <= 5){
                        $comment == false ? '' : print($i . ": " . $team1->name . " has scored!<br>");
                        $pk1 += 1;
                    } else {
                        $comment == false ? '' : print($i . ": " . $team1->name . " missed :(<br>");
                    }
                }

                for ($i = 1; $i <= 5; $i++){
                    $pkr = rand(1, 10);
                    if ($pkr <= 5){
                        $comment == false ? '' : print($i . ": " . $team2->name . " has scored!<br>");
                        $pk2 += 1;
                    } else {
                        $comment == false ? '' : print($i . ": " . $team2->name . " missed :(<br>");
                    }
                } // end of PK

                $team1->PK = $pk1;
                $team2->PK = $pk2;

                $comment == false ? '' : print("Final score after penalties: " . $team1->name . " " . $t1goal . "(" . $team1->PK . ")" . ":" . "(". $team2->PK .")" . $t2goal . " " . $team2->name . "<br>");

                // if the score after first series of 5 shots is draw then we have Sudden death
                if ($pk1 == $pk2){
                    $comment == false ? '':  print("It's draw! The winner will be decided with - Sudden death<br>");
                    while ($pk1 == $pk2){
                        $sdr1 = rand(1, 10);
                        $sdr2 = rand(1, 10);
                        if ($sdr1 > 5 && $sdr2 > 5){
                            $comment == false ? '':  print($team1->name . " has scored!<br>");
                            $comment == false ? '':  print($team2->name . " has scored!<br>");
                            $pk1 += 1;
                            $pk2 += 1;
                        } else if ($sdr1 >= 5 && $sdr2 <= 5){
                            $comment == false ? '':  print($team1->name . " has scored!<br>");
                            $comment == false ? '':  print($team2->name . " missed :(<br>");
                            $pk1 += 1;
                        } else if ($sdr1 <= 5 && $sdr2 >= 0.5){
                            $comment == false ? '':  print($team1->name . " missed :(<br>");
                            $comment == false ? '':  print($team2->name . " has scored!<br>");
                            $pk2 += 1;
                        }
                    } // end of sudden death

                    $team1->PK = $pk1;
                    $team2->PK = $pk2;

                    // printout final score after Sudden death
                    $comment == false ? '':  print("Final score after Sudden death: " . $team1->name . " " . $t1goal . "(" . $team1->PK . ")" . ":" . "(". $team2->PK .")" . $t2goal . " " . $team2->name . "<br>");

                } // end of Sudden death
            } // end of penalty shoot-out

    } // end of function
}
