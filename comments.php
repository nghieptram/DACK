<?php
require_once 'init.php';

$from = "index";
if(!$currentUser){
    header('Location: index.php');
    exit();
}

if(isset($_GET['type'],$_GET['id'],  $_GET['from']))
{
    $from = $_GET['from'];
    $content=$_POST['contents'];
    $userdd=$currentUser['id'];
    $contentprfile=$_POST['contents'];
    $type=$_GET['type'];
    $id=(int)$_GET['id'];
    switch($type){
        case'upcommentindex':
            upcomment($currentUser['id'], $id,$content);
            header('Location: index.php'); 
            break;
        case'upcommentprofile':
            upcomment($currentUser['id'], $id,$contentprfile);
            header("Location: profile.php?id=$userdd");
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

