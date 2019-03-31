<table width="300">
    <?php
    Game::simulate($groupF['1'], $groupF['2']);
    Game::simulate($groupF['3'], $groupF['4']);
    Game::simulate($groupF['1'], $groupF['3']);
    Game::simulate($groupF['4'], $groupF['2']);
    Game::simulate($groupF['4'], $groupF['1']);
    Game::simulate($groupF['2'], $groupF['3']);
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
    <?php Presenter::getSortedGroupTable($groupF); ?>
</table>