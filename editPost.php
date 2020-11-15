<?php
require 'session.php';

  $pid = $_GET['id'];

  $userPost = get_post_by_pid($pid); //Clicked post to edit

  $title = $userPost['title'];
  $content = $userPost['content'];

  //echo $title;
  //echo $content;
  
  //submitChanges will just redirect to the page -- no ajax
  echo"
  <div class = 'editUserPostContainer'>
    <form action='submitChanges.php'>
      <input id = 'pid' type='hidden' name='pid' value=$pid> 
      <label>Title</label> <br>
      <input id = 'title' type='text' name='Title' value=$title> <br>
      <label>Content</label> <br>
      <textarea id='textArea' name='Content'>$content</textarea> <br>
      <input type='submit' value='Submit'>
    
    </form>
  </div>
  ";

  /*<script>
  val textArea = ".$content.";
  val title = ".$title.";
  document.getElementById('textArea').value = 'hahahaha';
  document.getElementById('title').value = title;
  </script>*/ 
?>

