<table width="300">
    <?php
    Game::simulate($groupC['1'], $groupC['2']);
    Game::simulate($groupC['3'], $groupC['4']);
    Game::simulate($groupC['4'], $groupC['2']);
    Game::simulate($groupC['1'], $groupC['3']);
    Game::simulate($groupC['4'], $groupC['1']);
    Game::simulate($groupC['2'], $groupC['3']);
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
    <?php Presenter::getSortedGroupTable($groupC); ?>
</table>