<div class="group-phase">
    <h3>Group E</h3>
    <table width="300">
        <?php
        Game::simulate($groupE['1'], $groupE['2']);
        Game::simulate($groupE['3'], $groupE['4']);
        Game::simulate($groupE['1'], $groupE['3']);
        Game::simulate($groupE['4'], $groupE['2']);
        Game::simulate($groupE['4'], $groupE['1']);
        Game::simulate($groupE['2'], $groupE['3']);
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
        <?php Presenter::getSortedGroupTable($groupE); ?>
    </table>
</div>