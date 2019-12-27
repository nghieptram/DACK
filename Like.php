<?php
require_once 'init.php';

$from = "index";
if(isset($_GET['type'],$_GET['id'], $_GET['from'])){
    $type=$_GET['type'];
    $from = $_GET['from'];
    $id=(int)$_GET['id'];
    // echo "<script type='text/javascript'>alert('$id');</script>";

    switch($type){
        case'like':
            $db->query("INSERT INTO likes (post_id,userId)
            SELECT {$id},{$currentUser['id']}
            FROM posts
            WHERE EXISTS (
                SELECT id from posts where id = {$id})
            AND NOT EXISTS (
                SELECT like_id from likes where userId = {$currentUser['id']}
                and post_id={$id} )
            Limit 1
            ");
          
            break;
        case'unlike':
                $db->query("DELETE FROM likes WHERE userId={$currentUser['id']} AND post_id={$id}
                ");
         break;
    }
}

 if($from == "index") {
              header('Location: index.php');
            } else if ($from == "userprofile") {
              header('Location: userprofile.php');
            } else {
              header("Location: profile.php?id={$_GET['friendId']}");
            }

