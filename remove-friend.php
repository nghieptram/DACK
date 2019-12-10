<?php
require_once 'init.php';

if (!$currentUser) {
  header('Location: index.php');
  exit();
}
 $userId = $_POST['id'];
 $profile = findUserById($userId);
removefriendRequest($currentUser['id'],$profile['id']);
header('Location: profile.php?id='. $_POST['id'] );