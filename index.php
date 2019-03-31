<?php

require_once('setup.php');
require_once('Game.php');
require_once('Presenter.php');

$comment = false;
$PK = false;
$groupLetters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
?>

<link rel="stylesheet" href="style.css">

<?php

foreach ($groupLetters as $groupLetter) {
    include("group{$groupLetter}.php");
    echo '<br><hr>';
}

?>
<div class="next-step">
    <a href="/?round16">Next to the round of 16</a>
</div>