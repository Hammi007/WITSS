<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cloud9</title>
  <style>@import url("styling5.css");</style>
</head>
<body>


<?php



session_start();

require_once "/home/mir/forum/forum.php";

  if (empty($_SESSION['uid'])) {echo "<span id=login>", "Fejl i login", "<br>",
    "<a href=login.php>Gå til login-siden</a>", exit, "</span>";}

  else {$uid = $_SESSION['uid'];}

?>
