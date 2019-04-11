<div class="group-phase">
    <h3>Group D</h3>
    <table width="300">
        <?php
        Game::simulate($groupD['1'], $groupD['2']);
        Game::simulate($groupD['3'], $groupD['4']);
        Game::simulate($groupD['1'], $groupD['3']);
        Game::simulate($groupD['4'], $groupD['2']);
        Game::simulate($groupD['4'], $groupD['1']);
        Game::simulate($groupD['2'], $groupD['3']);
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
        <?php Presenter::getSortedGroupTable($groupD); ?>
    </table>
</div>