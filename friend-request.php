<?php 
require_once 'init.php';
$action = $_POST['action'];
$profileId = $_POST['profileId'];
$notifyID = $_POST['notifyID'];


if ($action == 'unfriend') {
  unfriend($currentUser['id'], $profileId);
}
if ($action == 'send-friend-request') {
  sendFriendRequest($currentUser['id'], $profileId);
}
if ($action == 'accept-friend-request') {
  acceptFriendRequest($currentUser['id'], $profileId);
}
if ($action == 'reject-friend-request') {
  rejectFriendRequest($currentUser['id'], $profileId);
}
if ($action == 'cancel-friend-request') {
  cancelFriendRequest($currentUser['id'], $profileId);
}

if ($notifyID == '1') {
  insertNotify_Notify($currentUser['id'], $profileId);
}

header('Location: profile.php?id=' . $profileId);
?>