<?php
require 'session.php';

  ?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Din side</title>
  <style>@import url("styling5.css");</style>
  <script src = "editFunction.js"></script>
</head>
<body>
<main>

<?php

include 'nav.php';

$aname=$_POST['name'];
$apass=$_POST['password'];

//if ((empty($aname)) || (empty($apass))) {echo "Yo";}

if (modify_user($apass, $aname) == true) {echo "<div class= tekst2>", "<br>", "<br>", "Dine oplysninger er nu opdaterede", "</div>", "<br>";}
else {echo "";}


echo "<div class= postDin>";
echo "<h2> Velkommen ", $uid, "</h2>", "<br>" ;


  $user=get_user_by_uid($uid);

  echo "<div class = klump>";
  echo "<h3> Dine oplysninger </h3>";
  echo "<br>";
    echo  "<div class= oplys>",
      "Dit navn: ",
      $user['name'],
      "<br>",
      "Dit brugernavn: ",
      $user['uid'], "<br>", "Oprettelse: ", $user['date'],
    "</div>",
    "<br>";
  echo "</div>";
  echo "<br>";
  echo "<br>";

?>
  <section class='klump'>

    <h3> Rediger dine oplysninger </h3>
  <br>
    <div class = 'tekst'> Hvis du vil ændre i dit navn og password, så udfyld denne form: </div> <br>

    <div class='formular'>
      <form method="POST">
      <p><label for=a>Navn:</label><br>
      <input type="text" name="name"></p>
      <p><label for=a>Password:</label><br>
      <input type="password" name="password"></p>
      <br><input type="submit" value="Submit">
      </form>
    </div>
  <br>
  <br>

    <h3> Slet din bruger:</h3>
    <br>

    <div class= 'tekst'> Hvis du vil slette din bruger, så tryk her: </div><br>

    <form action=delete.php>
      <input type=submit value="Slet bruger">
    </form>
    <br>

  </section>

  <br>
  <br>

<?php

echo "<div class=klump>";

  echo "<br>", "<h3> Se dine posts: </h3>";

  $posts = get_posts_by_uid($uid);

  echo "<div class=prov>";

    foreach ($posts as $post) {

    $indlag = get_post_by_pid($post);

    $pid = $indlag['pid'];

    echo "<section id = 'userPostContainer".$pid."' class='postMain'>";

      echo "<button id = 'edit".$pid."' onclick = 'editFunction(".$pid.")'> EDIT </button>","<br>";

      echo "<div class = 'linkTitle'>", '<a href=posts.php?pid='.$pid.'>'.$indlag['title'].'</a>', '</div>';

      echo "<span id = 'postUid'>";
      echo '<a href=bruger.php?uid='.$uid.'>'.$indlag['uid'].'</a>';
      echo "<span id = 'postDate'>", " - ", $indlag['date'], '</span>';
      echo '</span>';

      echo "<div class = 'content'>";
      echo $indlag['content'];
      echo '</div>';

      echo "<div class=sletPost>", '<a href=deletepost.php?pid='.$pid.'>Slet post</a>', "</div>";

    echo "</section>";

  }


  echo "</div>";


echo "</div>";

echo "<br>";
echo "<br>";

  $user=get_user_by_uid($uid);


?>

</main>

</div>



<?php include 'footer.php'; ?>

</body>
</html>
