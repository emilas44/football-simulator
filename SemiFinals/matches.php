<h3>Semi Finals</h3>
<table>
<?php
    Game::simulate(Presenter::$passedQuarterFinals[0], Presenter::$passedQuarterFinals[1]);
    Presenter::getWinnerSemiFinals([Presenter::$passedQuarterFinals[0], Presenter::$passedQuarterFinals[1]]);

    Game::simulate(Presenter::$passedQuarterFinals[2], Presenter::$passedQuarterFinals[3]);
    Presenter::getWinnerSemiFinals([Presenter::$passedQuarterFinals[2], Presenter::$passedQuarterFinals[3]]);
?>
</table>

<br>
<hr>