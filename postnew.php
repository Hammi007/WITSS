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


$title = $_GET['title'];
$content = $_GET['content'];

$parent_id = $_GET['parentid'];
$pid = $_GET['pid'];


//$pid = count($pids) + 1;

if (add_post($parent_id, $title, $content)){
header("refresh:0; url=main.php");
  //echo "ja";
}

else {echo "<span id=login>", "Der er sket en fejl. Prøv igen ", "<a href=main.php>Gå til forsiden</a>", exit, "</span>";}

//$new = get_post_by_pid($pid);
//{echo $new['content'];}
//$pid = count($pids) + 1;
//{echo $pid;}


 ?>
