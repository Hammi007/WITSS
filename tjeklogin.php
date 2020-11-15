<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cloud9</title>
  <style>@import url("styling5.css");</style>
</head>
<body>



<?php

session_start();

require_once "/home/mir/forum/forum.php";

    $uid=$_POST['username'];
    $password=$_POST['password'];
//    $user=get_user_by_uid($uid);

  if (login($uid, $password) == true) {$_SESSION['uid'] = $uid;
    (header('Location:main.php'));
    exit;
  }



//if (! empty($_SESSION['user']))
//    {($_SESSION['user'] = $dinuid);
  //    header('Location:main.php');
  //    exit;
  //  }

    else {echo  "<span id=login>", "Brugernavn eller kodeord forkert.", "<br>", "Du vil nu blive ført til login-siden.", "</span>";
     header ("refresh:3; url=login.php");
   exit;
          }
?>
