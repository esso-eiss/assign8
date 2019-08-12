<?php


$moves = array("rock", "paper", "scissors", "lizard", "spock");
$output = "<h4>Results</h4>";
$winner = array(                 "rock" => "paper",
				 "paper" => "scissors",
				 "scissors" => "rock",
                                 "lizard" => "scissors",
                                 "lizard" => "rock",
                                 "spock" => "lizard",
                                 "paper" => "lizard",
                                 "scissors" => "spock",
                                 "spock" => "paper",
                                 "rock" => "spock"
    );
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$player = $_POST['move'];
	$machine = $moves[array_rand($moves)];
	$output .= "<p>Your board<br><kbd>$player</kbd></p>";
	$output .= "<p>Computer's board<br><kbd>$machine</kbd></p>";
	if ($machine == $player)
		$output .= "<p>IT IS A TIE.</p>";
	else
		$output .= ($winner[$machine] == $player)
						? "<p>YOU WIN.</p>"
						: "<p>YOU LOSE.</p>";
}
?>
<form method="POST">
	<h4>Your Move</h4>
	<select size="3" name="move" required>
		<option value="rock">Rock</option>
		<option value="paper">Paper</option>
		<option value="scissors">Scissors</option>
                <option value="lizard">Lizard</option>
                <option value="spock">Spock</option>
	</select>
	<input type="submit" value="Select And Play" />
        <button><a href='../index.php'> go back </a></button>
</form>
<aside><?= $output ?></aside>
