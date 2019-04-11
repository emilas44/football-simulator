<div class="knockout-phase">
    <h3>Quarter Finals</h3>
    <table>
    <?php
        Presenter::teamsReset(Presenter::$passedRoundOf16);

        Game::simulate(Presenter::$passedRoundOf16[0], Presenter::$passedRoundOf16[1]);
        Presenter::getWinnerQuarterFinals([Presenter::$passedRoundOf16[0], Presenter::$passedRoundOf16[1]]);

        Game::simulate(Presenter::$passedRoundOf16[2], Presenter::$passedRoundOf16[3]);
        Presenter::getWinnerQuarterFinals([Presenter::$passedRoundOf16[2], Presenter::$passedRoundOf16[3]]);

        Game::simulate(Presenter::$passedRoundOf16[4], Presenter::$passedRoundOf16[5]);
        Presenter::getWinnerQuarterFinals([Presenter::$passedRoundOf16[4], Presenter::$passedRoundOf16[5]]);

        Game::simulate(Presenter::$passedRoundOf16[6], Presenter::$passedRoundOf16[7]);
        Presenter::getWinnerQuarterFinals([Presenter::$passedRoundOf16[6], Presenter::$passedRoundOf16[7]]);
    ?>
    </table>

    <br>
    <hr>
</div>