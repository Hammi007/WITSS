<?php

require 'session.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cloud9</title>
  <style>@import url("styling5.css");</style>
  <script src = "like.js"></script>
</head>
<body>


  <?php

   include 'nav.php';

?>



<form action="postnew.php" method="GET">

  <head>
      <title>Vores webside</title>
    </head>

<h1>Opret et post</h1>

<div class=formular>
<p><label for=a>Title:</label><br>
<input type="text" name="title"></p>
<p><label for=a>Content:</label><br>
<textarea name="content" rows="4" cols="40"></textarea>
<p><input type="submit" value="Submit"></p>
</div>
  </form>
  <div id="mainajax"> <?php include_once ('mainajax.php')?> </div>
  <script>
    function ajax(url,handle) {
      var request = new XMLHttpRequest();
      request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          handle(this.responseText);
        }
      };
      request.open("GET", url, true);
      request.send();
    }
    function handle(text) {
      var elem = document.getElementById("mainajax");
      elem.innerHTML = text;
      window.setTimeout(f,20000);
    }
    function f() {
      ajax("mainajax.php", handle);
    }
    f ();
  </script>

</body>
</html>
