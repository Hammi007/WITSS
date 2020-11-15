<?php

require 'session.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cloud9</title>
  <style>@import url("styling3.css");</style>
</head>
<body>


  <?php

   include 'nav.php';

?>



<form action="postnew.php" method="GET">

  <head>
      <title>Alle posts</title>
    </head>


 <?php

   //<a href= brugere.php> Se alle brugere </a>

      $pids = get_posts();
      //print_r ($pids);

      $nr = count($pids);


$Main = get_posts_by_parent_pid(0);//zero = main

echo "<div class=prov>";

foreach ($Main as $main){
  $post = get_post_by_pid ($main);
    $pid= $post['pid'];
    $uid=$post['uid'];

echo '<section class = "postMain">';
  echo  "<div class = 'linkTitle'>", '<a href=posts.php?pid='.$pid.'>'.$post['title'].'</a>', '</div>';

  echo "<span id = 'postUid'>";
  echo '<a href=bruger.php?uid='.$uid.'>'.$post['uid'].'</a>';
  echo "<span id = 'postDate'>", " - ", $post['date'], '</span>';
  echo '</span>';


  echo '</section>';

}

echo "</div>";

include 'footer.php';

?>


</body>
</html>
