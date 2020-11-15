<?php

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
 echo  "<div class = 'linkTitle'>", '<a href=posts.php?pid='.$pid.'>'.$post['title'].'</a>', '</div>';

 echo "<span id = 'postUid'>";
 echo '<a href=bruger.php?uid='.$uid.'>'.$post['uid'].'</a>';
 echo "<span id = 'postDate'>", " - ", $post['date'], '</span>';
 echo '</span>';

 echo "<div class = 'postContent'>";
 echo $post['content'];
 echo '</div>';


 $numberlikes=count_likes_by_pid($post['pid']);
 echo "<div id = 'likeCount".$pid."' class='countLikes'>";
 echo "Likes: ", $numberlikes;
 echo "</div>";


 echo "<div class= 'kommentar'>", "<a href=postsforum.php?pid=".$pid."> Se kommentarer </a>", "</div>";


 echo '</section>';

}


?>
