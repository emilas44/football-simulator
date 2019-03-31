<table width="300">
    <?php
    Game::simulate($groupB['1'], $groupB['2']);
    Game::simulate($groupB['3'], $groupB['4']);
    Game::simulate($groupB['1'], $groupB['3']);
    Game::simulate($groupB['4'], $groupB['2']);
    Game::simulate($groupB['4'], $groupB['1']);
    Game::simulate($groupB['2'], $groupB['3']);
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
    <?php Presenter::getSortedGroupTable($groupB); ?>
</table>