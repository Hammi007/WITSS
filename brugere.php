<?php
require 'session.php';

?>

<!doctype html>

<html>
<head>
  <title>Find bruger</title>
  <style>@import url("styling5.css");</style>
</head>

<body>

<?php include 'nav.php'; ?>

<div class= postDin>
<h1> Find en bruger<h1>
  <br>

<h4> Slå en bruger op her:</h4>
<br>

<div class=findbruger>
<form action="bruger.php" method="GET">
<label for="uid">Brugernavn:</label>
 <input type="text" name="uid">
 <input type="submit" value="Find bruger">
</form>
</div>

<br>
<br>

<h4> Her kan du se alle brugere: </h4>
<br>
<?php

require_once "/home/mir/forum/forum.php";




   $uids=get_users();
echo "<div class=allebrugere>";

  foreach ($uids as $uid) {

    echo

  "<div class=bruger>",  $uid, " - ",
  "<a href=\"bruger.php?uid=".$uid."\"> Se brugeropslag </a>", "</div>";


echo "</div>";

}

echo "<br>";
echo "<br>";
include 'footer.php';

?>

</div>
</body>
</html>
