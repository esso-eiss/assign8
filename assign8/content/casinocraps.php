<?php

echo '
    <html>
    <body>
    <form method="POST" action="index.php?page=content/casinoCaps.php&pagetitle=Casino-Craps&members=false">
	<div class="grid-container">
		<div class="grid-item board">
	        <table>
	            <tr>
	                <td class="dice"><?= $alpha ?></td>
	                <td class="dice"><?= $bravo ?></td>
	            </tr>
	        </table>
	        <p>
	            <small>You rolled&hellip;</small>
	            <samp id="total"><?= $sum ?></samp>
	        </p>
	        <input type="submit" name="roll" class="roll" value="Roll the dice!">
		</div>
		<div class="grid-item">
	        <input type="submit" name="clear" class="roll" value="Reset game">
	        <h2 id="show" class="show">To start a game, roll the dice!<br></h2>
	        <p><?= $output ?></p>
	    </div>
	</div>
</form>
</body>
</html>
';

// initial values
$alpha = $bravo = $sum = NULL;
// get values from session variables if available
isset($_SESSION['point']) ? $point = $_SESSION['point'] : $point = 0;
isset($_SESSION['wins']) ? $wins = $_SESSION['wins'] : $wins = 0;
isset($_SESSION['losses']) ? $losses = $_SESSION['losses'] : $losses = 0;
$output = "";



// if "roll the dice" is clicked, start the game

if(isset($_POST['reset'])) {
    session_destroy();
}
function rollBoth() {

    $roll1 = roll();
    $roll2 = roll();
    $total = $roll1 + $roll2;
    determineOutcome($total, $roll1, $roll2);
}
function determineOutcome($total, $roll1, $roll2) {
   $message = array(
	"natural" => "That's a natural. You win!<br>NEW GAME. Roll the dice!",
	"craps" => "That's craps. You lose!<br>NEW GAME. Roll the dice!",
	"point" => "You made your point. You win!<br>NEW GAME. Roll the dice!",
	"seven" => "That's a seven. You lose!<br>NEW GAME. Roll the dice!"
	);

    $output = $total;

    if($total == 11 )
    {
        print_r($message['natural']);
    }else if($total == 2 || $total == 3 || $total == 12)
    {
        print_r($message['craps']);
    }else if($total == 4 || $total == 5 || $total == 6 ||
            $total == 8 || $total == 9 || $total == 10){
        print_r($message['point']);
    }else if($total == 7){
        print_r($message['seven']);
    }else if($total == 7)
    {
        print_r($message['natural']);
    }
echo '<br><br>';
    echo $output;
}
if(isset($_POST['roll'])) {
    rollBoth();
    updateSession();
}
// if "Reset game" is clicked, start the game
if(isset($_GET['clear'])) {
    session_destroy();
}
function updateSession() {
	global $point, $wins, $losses ;
	$_SESSION['point'] = $point;
	$_SESSION['wins'] = $wins;
	$_SESSION['losses'] = $losses;
}
function roll(){
  $random = mt_rand(1,6);
  return $random;
}
?>
