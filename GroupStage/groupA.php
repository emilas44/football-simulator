<div class="group-phase">
    <h3>Group A</h3>
    <table width="300">
        <?php
        Game::simulate($groupA['1'], $groupA['2']);
        Game::simulate($groupA['3'], $groupA['4']);
        Game::simulate($groupA['1'], $groupA['3']);
        Game::simulate($groupA['4'], $groupA['2']);
        Game::simulate($groupA['4'], $groupA['1']);
        Game::simulate($groupA['2'], $groupA['3']);
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
        <?php Presenter::getSortedGroupTable($groupA); ?>
    </table>
</div>