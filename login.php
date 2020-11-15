
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Document</title>
      <style>
         @import "styling5.css";
      </style>
  </head>


  <body>
  <div class=postDin>

      <h1>WELCOME TO CLOUD9</h1>

      <div class= klump>
      <h3> Login </h3>

        <div class=formular>
      <form action="tjeklogin.php" method="POST">
      <p>  <label for="username">Brugernavn</label></p>
      <input type="text" name="username" placeholder="Username...">
      <br>
        <p> <label for="password">Password</label></p>
         <input type="password" name="password" placeholder="Password...">
      <p>   <input type="submit" value="Login"></p>
    </form>

<div class=kommentar>  <a href="signup.html">Ikke oprettet endnu?</a></div>

      </div>
<h2> Nyeste posts </h2>
      <?php
  require_once "/home/mir/forum/forum.php";
        //<a href= brugere.php> Se alle brugere </a>

        $pids = get_posts();
        //print_r ($pids);

        $nr = count($pids);


   $Main = get_posts_by_parent_pid(0);//zero = main



   $inversedPosts = array_reverse($Main);
   $counter = 0;
   $counterLimit = 40;
   foreach ($inversedPosts as $main){
     $counter++;
     if($counter>$counterLimit){
     break;
     }


     //foreach ($Main as $main){

    $post = get_post_by_pid ($main);
    $pid= $post['pid'];
    $uid=$post['uid'];

    echo '<section class = "postMain">';
    echo  "<div class = 'linkTitle'>", '<a href=postsforum.php?pid='.$pid.'>'.$post['title'].'</a>', '</div>';

    echo "<span id = 'postUid'>";
    echo "<span id=forumb>", $post['uid'], "</span>";
    echo "<span id = 'postDate'>", " - ", $post['date'], '</span>';
    echo '</span>';

    echo "<div class = 'postContent'>";
    echo $post['content'];
    echo '</div>';


    $numberlikes=count_likes_by_pid($post['pid']);
    echo "<div id = 'likeCount".$pid."' class='countLikes'>";
    echo "Likes: ", $numberlikes;
    echo "</div>";

    echo "<br>";

    echo "<div class= 'kommentar'>", "<a href=postsforum.php?pid=".$pid."> Se kommentarer </a>", "</div>";


    echo '</section>';

   }

   ?>
    </div>
  </div>



  </body>
  </html>
