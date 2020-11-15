<?php
require 'session.php';

$title = $_GET['Title'];
$content = $_GET['Content'];
$id = $_GET['pid'];

modify_post($id, $title, $content);
//DONE?



header( "location:dinside.php");

?>
