<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Cloud9</title>
  <style>@import url("styling5.css");</style>
</head>
<body>


<?php
require 'session.php';



include 'nav.php';

$uid = $_GET['uid'];


$posts = get_posts_by_uid($uid);

if (get_user_by_uid($uid) == false) {echo "<span id= login>", "Vi kunne desværre ikke finde brugernavnet i systemet",
   "<br>", "<a href=brugere.php>Gå tilbage til søgning</a>", exit, "</span>";}

elseif (!$posts) {echo "<h2>", $uid, "'s opslag", "</h2>",
  "<span id=login>", $uid, " har endnu ikke postet nogen opslag", "<br>", "<a href=brugere.php>Gå tilbage til søgning</a>", "</span>", exit;}

else {echo "<h2>", $uid, "'s opslag", "</h2>", "<br>";

foreach ($posts as $post) {

echo "<div class= postMain>";
//Returnerer et array af id'ere for alle indlæg skrevet af bruger uid.

$indlag = get_post_by_pid($post);


$pid = $indlag['pid'];


  echo  "<div class = 'linkTitle'>", '<a href=posts.php?pid='.$pid.'>'.$indlag['title'].'</a>', '</div>';

//elseif {echo $uid, " har skrevet folgende opslag:", "<br>";

//elseif ($indlag['parent_pid'] == 0) {

echo "<div class=sletPost>", "<a href=\"posts.php?pid=".$pid."\"> Se indlæg </a>", "</div>", "<br>";

echo "</div>";}}

echo "<br>";
echo "<br>";

include 'footer.php';


?>

</body>
</html>
