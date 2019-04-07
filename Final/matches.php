<h3>Third Place</h3>
<table>
    <?php
    Game::simulate(Presenter::$thirdPlace[0], Presenter::$thirdPlace[1]);
    Presenter::getWinnerSemiFinals([Presenter::$thirdPlace[0], Presenter::$thirdPlace[1]]);
    ?>
</table>

<br>
<hr>

<h3>FINAL</h3>
<table>
<?php
    Game::simulate(Presenter::$passedSemiFinals[0], Presenter::$passedSemiFinals[1]);
    Presenter::getWinnerSemiFinals([Presenter::$passedSemiFinals[0], Presenter::$passedSemiFinals[1]]);
?>
</table>

<br>
<hr>