<?php
session_start();


function generateRandomNumber() {
    return rand(1, 5);
}


function calculateScore($tries) {
    $maxTries = 50;
    $difference = abs($tries - $maxTries);
    
    if ($difference <= $maxTries * 0.1) {
        return 100;
    } elseif ($difference <= $maxTries * 0.2) {
        return 75;
    } elseif ($difference <= $maxTries * 0.3) {
        return 50;
    } elseif ($difference <= $maxTries * 0.4) {
        return 25;
    } else {
        return 20;
    }
}


if (!isset($_SESSION['target'])) {
    $_SESSION['target'] = generateRandomNumber();
    $_SESSION['tries'] = 0;
}

if (isset($_POST['guess'])) {
    $userGuess = (int)$_POST['guess'];
    $target = $_SESSION['target'];
    $tries = $_SESSION['tries'] + 1;
    $message = "Your guess is: $userGuess<br>";
    $message .= "Attempts: $tries<br>";

    if ($userGuess == $target) {
        $message .= "Congratulations! You guessed the number $target. Your score is " . calculateScore($tries) . " points.";
        unset($_SESSION['target']);
    } else {
        $difference = abs($target - $userGuess);
        if ($difference <= 10) {
            $message .= "You are getting warmer.";
        } else {
            $message .= "You are getting colder.";
        }

        if ($tries >= 50) {
            $message = "You've reached the maximum number of tries. The answer was $target. Your score is 0 points.";
            unset($_SESSION['target']);
        }
    }

    $_SESSION['tries'] = $tries;
} else {
    $message = "Guess a number between 1 and 100.";
    $message .= "Attempts: " . ($_SESSION['tries'] + 1) . "<br>";
}

if (isset($_POST['end'])) {
    $message = "The game has ended. The answer was " . $_SESSION['target'] . ". A new number has been generated.";
    unset($_SESSION['target']);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Number Guessing Game</title>
    <link href="num-guessing.css" rel="stylesheet">
</head>
<body>
    <h1>Number Guessing Game</h1>
    <p><?php echo $message; ?></p>
    
    <div id="box">
    <form id="rawr" method="post">
        <label for="guess">Your Guess:</label>
        <input type="text" name="guess" id="guess" required>
        <button type="submit">Submit</button>
        <button type="submit" name="end">End Game</button>
    </form>
    </div>
</body>
</html>
