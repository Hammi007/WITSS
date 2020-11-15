
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cloud9</title>
  <style>@import url("styling5.css");</style>
</head>
<body>


<?php

require 'session.php';

include 'nav.php';

$pid = $_GET['pid'];

if (delete_post($pid) == true) {echo "<span id=login>", "Dit opslag er nu slettet. Du vil blive ført til din side :)", "</span>";
  header("refresh:1; url=dinside.php");
   exit;}
//   "<br>", "<a href=dinside.php>Gå tilbage til din side</a>", "</span>", exit;}

else {echo "<span id=login>", "Noget gik galt",  "<br>", "<a href=dinside.php>Gå tilbage til din side</a>", "</span>", exit;}


?>


</body>
</html>
