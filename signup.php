<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Cloud9</title>
  <style>@import url("styling5.css");</style>
</head>
<body>


<?php

require_once "/home/mir/forum/forum.php";

   $uids=get_users();

   $name = $_POST["name"];
   $uid = $_POST["username"];
   $password = $_POST["password"];

  if (add_user($uid,$password,$name) == false){
    echo "<span id=login>", "Brugernavnet er desværre optaget.", "<br>", "Du vil nu blive ført til signup-siden.", "</span>";
    header ("refresh:3; url=signup.html");  }


else {  echo "<span id=login>", "Velkommen ", $name, "! ", "<br>", "Du er nu oprettet. Du vil blive ført til login-siden :) ", "</span>";
  header( "refresh:3; url=login.php" );


}
?>
