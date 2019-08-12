
<?php
    session_start();
?>

<html>
<head>
 <link rel="stylesheet" href="css/grid.css">
 <link rel="stylesheet" href="css/cats.css">
 <link rel="stylesheet" href="css/template.css">
<link href="http://bajcar.dev.fast.sheridanc.on.ca/syst10199/checklists/css/grid_2019_6_4.css" rel="stylesheet">
<!-- Page specific CSS obtained by php -->
 <link rel="stylesheet" href="">
 </head>
<?php
include ('includes/header.php');
require ('includes/nav_public.php');
if(isset($_GET['page'])) {
    $includepage=$_GET['page'];
    include_once ( $includepage );
    // will be replaced by include_once ( 'content/whateverfileyouspecify.php' );
} else {
    //home page content
    require_once ( 'content/welcome.php' );
}
include ('includes/footer.php');
