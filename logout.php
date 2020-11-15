<?php
session_start();
require_once '/home/mir/forum/forum.php';

//$logout = $_GET['logout'];
    logout();
    header( "location: login.php");

?>
