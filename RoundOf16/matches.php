<div class="knockout-phase">
    <h3>Round Of 16</h3>
    <table>
    <?php
        Presenter::teamsReset(Presenter::$passedGroup);

        Game::simulate(Presenter::$passedGroup[0], Presenter::$passedGroup[3]);                 // A1 vs B2 0:3
        Presenter::getWinnerRound16([Presenter::$passedGroup[0], Presenter::$passedGroup[3]]);

        Game::simulate(Presenter::$passedGroup[4], Presenter::$passedGroup[7]);                 // C1 vs D2 4:7
        Presenter::getWinnerRound16([Presenter::$passedGroup[4], Presenter::$passedGroup[7]]);

        Game::simulate(Presenter::$passedGroup[8], Presenter::$passedGroup[11]);                // E1 vs F2 8:11
        Presenter::getWinnerRound16([Presenter::$passedGroup[8], Presenter::$passedGroup[11]]);

        Game::simulate(Presenter::$passedGroup[12], Presenter::$passedGroup[15]);               // G1 vs H2 12:15
        Presenter::getWinnerRound16([Presenter::$passedGroup[12], Presenter::$passedGroup[15]]);

        Game::simulate(Presenter::$passedGroup[2], Presenter::$passedGroup[1]);                 // B1 vs A2 2:1
        Presenter::getWinnerRound16([Presenter::$passedGroup[2], Presenter::$passedGroup[1]]);

        Game::simulate(Presenter::$passedGroup[6], Presenter::$passedGroup[5]);                 // D1 vs C2 6:5
        Presenter::getWinnerRound16([Presenter::$passedGroup[6], Presenter::$passedGroup[5]]);

        Game::simulate(Presenter::$passedGroup[10], Presenter::$passedGroup[9]);                // F1 vs E2 10:9
        Presenter::getWinnerRound16([Presenter::$passedGroup[10], Presenter::$passedGroup[9]]);

        Game::simulate(Presenter::$passedGroup[14], Presenter::$passedGroup[13]);               // H1 vs G2 14:13
        Presenter::getWinnerRound16([Presenter::$passedGroup[14], Presenter::$passedGroup[13]]);
    ?>
    </table>

    <br>
    <hr>
</div>