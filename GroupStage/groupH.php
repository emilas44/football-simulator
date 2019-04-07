<table width="300">
    <?php
    Game::simulate($groupH['1'], $groupH['2']);
    Game::simulate($groupH['3'], $groupH['4']);
    Game::simulate($groupH['1'], $groupH['3']);
    Game::simulate($groupH['4'], $groupH['2']);
    Game::simulate($groupH['4'], $groupH['1']);
    Game::simulate($groupH['2'], $groupH['3']);
    ?>
</table>
<br>
<table class="group" style="width: 500px">
    <tr>
        <th>Pos</th>
        <th>Team</th>
        <th>W</th>
        <th>D</th>
        <th>L</th>
        <th>GF</th>
        <th>GA</th>
        <th>GD</th>
        <th>Pts</th>
    </tr>
    <?php Presenter::getSortedGroupTable($groupH); ?>
</table>

<br>
<hr>

<div class="next-round-wrapper">
    <button id="round-16" class="next-round">Next to the round of 16</button>
</div>