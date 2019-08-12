
<?php
// Grab User submitted information
$username = $_POST["username"];
$pass = $_POST["password"];

// Connect to the database
$esr = mysqli_connect("eissae.dev.fast.sheridanc.on.ca","eissae","#SgtA4d*UPw","eissae_assign8");

// Make sure we connected successfully
if(! $esr)
{   die("Error connection string.");
    die('Connection Failed'.mysqli_error());
}

// Select the database to use
//mysqli_select_db($esr,"eissae_assign8");

$result = mysqli_query($esr,"select * from users where username = '$username'")
    or die('Error In Session');
$row = mysqli_fetch_array($result);

if($row["username"]==$username && $row["password"]==$pass)
    echo "Successfully loged in.";
    //http_redirect("http://eissae.dev.fast.sheridanc.on.ca/content/login_success.php");
else
    echo "invalid username or password!";
    //http_redirect("http://eissae.dev.fast.sheridanc.on.ca/content/login_nosuccess.php");
?>
