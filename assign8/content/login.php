<?php

echo '<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Login</title>
<div class="narrow">
            <form method="POST">
                    <label>Enter Username</label>
                    <input type="text" name="username" placeholder="Enter your username (required)" required>
                    <label>Enter Password</label>
                    <input type="password" name="password" placeholder="Enter your password (required)" required>
                    <input type="hidden" name="curdate" value="<?php $date = date("Y-m-d"); echo $date;?>
                    <input type="submit" value="Login">
                    <input type="reset" value="Reset">
            </form>
</div>';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_SESSION['formAttemp'] = true;
    $_SESSION['id'] = session_id();
    $_SESSION['isLoggedIn'] = false;

    if (isset($_POST['password'])) {
        if (!empty($_POST['password'])) {
            $_SESSION['password'] = $_POST['password'];
        }
    }

    // TODO: can be used to record last time the user logged in successfully
    $_SESSION['startDate'] = $_POST['curdate'];

    if (isset($_POST['username'])) {
        if (!empty($_POST['username'])) {
            $safeuser = $_POST['username'];
            $_SESSION['firstName'] = $_POST['username'];
        } else {
            echo "handle the bad name";
        }
    }
    require_once("includes/Member.class");
    $visitor = new Member;
    if ($visitor->authenticate($_POST['username'], $_POST['password'])) {
        // proceed to member site
        echo <<<_LOG_
    <h3>Authentication successful.</h3>
    <a href='index.php?page=content/welcome.php&members=true&pagetitle=Members-only%20Home%20Page'>
        Proceed
    </a>
_LOG_;
    } else {
        // return to login
        session_destroy();
        echo <<<_NOLOG_
        <br>
    <h3>Authentication was unsuccessful.</h3>
    <a href='index.php?page=content/login.php'>
        Try Again
    </a>
_NOLOG_;
    }
}
