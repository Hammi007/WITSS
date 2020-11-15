<?php
require 'session.php';

include 'nav.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cloud9</title>
  <style>@import url("styling5.css");</style>
</head>
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
echo '<a href=bruger.php?uid='.$uid.'>'.$post['uid'].'</a>';
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

echo "<form action='postanswer.php' method='GET'>";
echo " <input type='hidden' name='pid' value=$postpid>";
echo "  <input type='hidden' name='parentid' value='",$post['pid'],"'>";
echo "  <input type='text' name='title'  value='Re: ",$post['title'],"'>";
echo "<br>";
echo " <textarea name='content' placeholder='Skriv kommentar her' rows='3' cols='50'></textarea>";
echo "<br>";
echo "  <input type='submit' value='Post'>";
echo "</form>";

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
      echo '<a href=bruger.php?uid='.$postAnswer['uid'].'>'.$postAnswer['uid'].'</a>';
      echo "<span id = 'postDate'>", " - ", $postAnswer['date'], '</span>';
      echo '</span>';


      echo '<div class = "postContent">';
      echo $postAnswer['content'];
      echo '</div>';

      echo "<br>";

        echo "<form method='GET' action='postanswer.php'>";
        echo "  <input type='hidden' name='pid' value='$postpid'>";
        echo "  <input type='hidden' name='parentid' value='",$postAnswer['pid'],"'>";
        echo "  <input type='text' name='title' value='Re: ",$postAnswer['title'],"'>";
        echo "<br>";//  echo "  <input type='<textarea>' placeholder='Skriv kommentar her' name='content'>";
        echo " <textarea name='content' placeholder='Skriv kommentar her' rows='3' cols='50'></textarea>";
        echo "<br>";
        echo "  <input type='submit' value='Post'>";
        echo "</form>";

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
      echo '<a href=bruger.php?uid='.$postAnswer2x['uid'].'>'.$postAnswer2x['uid'].'</a>';
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
    echo '<a href=bruger.php?uid='.$post['uid'].'>'.$post['uid'].'</a>';
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

 echo "<br>";
 echo "<br>";

include 'footer.php';
?>

</body>
</html>
