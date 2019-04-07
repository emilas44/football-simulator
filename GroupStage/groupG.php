<table width="300">
    <?php
    Game::simulate($groupG['1'], $groupG['2']);
    Game::simulate($groupG['3'], $groupG['4']);
    Game::simulate($groupG['1'], $groupG['3']);
    Game::simulate($groupG['4'], $groupG['2']);
    Game::simulate($groupG['4'], $groupG['1']);
    Game::simulate($groupG['2'], $groupG['3']);
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
    <?php Presenter::getSortedGroupTable($groupG); ?>
</table>