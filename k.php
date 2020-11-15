<?php
header('Content-Type: application/json');
session_start();
require_once "/home/mir/forum/forum.php";

//print_r(in_array($_SESSION['uid'],$likes));
$likes = get_likes_by_pid($_GET['id']);
$likeCount = count($likes);

if(in_array($_SESSION['uid'],$likes)){

    $json = [ 
        'nrLikes' => $likeCount,
        'likedBy' => $likes,
        'response' => 1
    ];
    delete_like($_GET['id']);
    echo json_encode($json);
}
else if(in_array($_SESSION['uid'],$likes)==false) {
    $json = [ 
        'nrLikes' => $likeCount,
        'likedBy' => $likes,
        'response' => 0
    ];
    add_like($_GET['id']);
    echo json_encode($json);
}

?>

