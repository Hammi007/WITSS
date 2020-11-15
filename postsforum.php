<?php
  require_once "/home/mir/forum/forum.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cloud9</title>
  <style>@import url("styling5.css");</style>
</head>
<a href="login.php"> <h3> Klik her for at komme tilbage til forummet </h3> </a>
<body>

  <?php

$postpid=$_GET['pid'];

$post = get_post_by_pid ($postpid);

if ($post['parent_pid'] == 0) {

echo '<section class = "postMain">';

echo "<div class = 'postTitle'>";
echo $post['title'];
echo '</div>';

echo "<span id = 'postUid'>";
echo "<span id=forumb>", $post['uid'], "</span>";
echo "<span id = 'postDate'>", " - ", $post['date'], '</span>';
echo '</span>';

echo "<div class = 'postContent'>";
echo $post['content'];
echo '</div>';

$numberlikes=count_likes_by_pid($postpid);
echo "<div class = 'countLikes'>";
echo "Likes: ", $numberlikes;
echo "</div>";

$wholikes=get_likes_by_pid($postpid);
foreach ($wholikes as $wholike){
echo "<div class = 'whoLikes'>";
echo $wholike;
echo "</div>";}

echo "<br>";

echo '</section>';


echo "<br>";


$answer=get_posts_by_parent_pid($postpid);


foreach ($answer as $answer){ {
    $postAnswer = get_post_by_pid($answer);

    $answerPid=$postAnswer['pid'];

    echo '<section class = "postAnswer center">';

      echo '<div class = "answerTitle">';
      echo $postAnswer['title'];
      echo '</div>';

      echo "<span id = 'answerUid'>";
      echo "<span id=forumb>", $postAnswer['uid'], "</span>";
      echo "<span id = 'postDate'>", " - ", $postAnswer['date'], '</span>';
      echo '</span>';


      echo '<div class = "postContent">';
      echo $postAnswer['content'];
      echo '</div>';

      echo "<br>";

    echo '</section>';
    echo "<br>";

  }


  $answer2x = get_posts_by_parent_pid ($postAnswer['pid']);
  foreach ($answer2x as $answer2x) {
    $postAnswer2x = get_post_by_pid($answer2x);

    echo "<section class = 'postAnswer2x'>";

      echo '<div class = "answerTitle">';
      echo $postAnswer2x['title'];
      echo '</div>';

      echo "<span id = 'answerUid'>";
      echo "<span id=forumb>", $postAnswer2x['uid'], "</span>";
      echo "<span id = 'postDate'>", " - ", $postAnswer2x['date'], '</span>';
      echo '</span>';

      echo '<div class = "postContent">';
      echo $postAnswer2x['content'];
      echo '</div>';

    echo '</section>';
    echo "<br>";
  }

}}


else {$pp = get_post_by_pid($post['parent_pid']);

  echo "<h1>" ;
  echo "Det valgte oplæg:";
  echo "</h1>";

    echo "<div class= postMain>";


    echo "<div class = 'postTitle'>";
    echo $post['title'];
    echo '</div>';

    echo "<span id = 'postUid'>";
    echo '<a href=bruger.php?uid='.$uid.'>'.$post['uid'].'</a>';
    echo "<span id = 'postDate'>", " - ", $post['date'], '</span>';
    echo '</span>';

    echo "<div class = 'postContent'>";
    echo $post['content'];
    echo '</div>';

    echo "</div>";


  echo "<h4>";
  echo "<br>", "Dette er et svar på post: ";
  echo "</h4>";

echo '<section class = "postAnswer center">';

    echo '<div class = "aTitle">', '<a href=posts.php?pid='.$pp['pid'].'>'.$pp['title'].'</a>', '</div>';

    echo "<div class=tekst>", "oprettet af: ", "</div>";

   echo "<span id = 'answerUid'>";
   echo '<a href=bruger.php?uid='.$pp['uid'].'>'.$pp['uid'].'</a>', "<br>";
   echo "</span>";

  echo "<br>";
  echo "</section>";}

?>

</body>
</html>
