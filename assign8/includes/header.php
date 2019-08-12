
<!DOCTYPE html>
<?php
//Author: Esraa Eissa
//File: index.html
//Creation date: 09-Augest-2019
//Updated:
//Version: 1.1
//Purpose:
//Citations: https://github.com/ebajcar/syst10199/blob/exercises/projects/Phase%20II%20notes%20part%20B.md
//Description: Home page of the Gaming Cats' Clubhouse. This webpage will provide the user with ability to
//             open one of the pages with games, provide a welcome message and some details about
//						 memberships.
//-->

$pagetitle = (isset($_GET['pagetitle']))
    ? $_GET['pagetitle']
    : "Gaming Cat's Clubhouse";

?>
<html>
    <head>
        <title><?= $pagetitle ?></title>
    </head>
    <body>
        <header>
            <h1><?= $pagetitle ?></h1>
        </header>
        <main>
        <div class="flex-container">
