<?php
require_once 'init.php';
$updateprofile = findUserById($_GET['id']);
$friendship = getFriends($currentUser['id']);
foreach ($friendship as $friend) {
  if ($friend['id'] == $updateprofile['id']) {
    $isFriend = true;
  }
}
if (!$currentUser) {
  header('Location: index.php');
  exit();
}
 $userId = $_GET['id'];
 $updateprofile = findUserById($userId);

$isfollowing = getfriendship($currentUser['id'],$userId);
$isfollower  =  getfriendship($userId,$currentUser['id']);
?>
<?php include 'InHeader.php' ?>
 <h1><?php echo $updateprofile['fullname'] ?></h1>
<img src="./IMG/<?php echo $updateprofile['id'] ?>.jpg">
<?php  if($isfollowing & $isfollower) : ?>
Ban Be
<form method = "POST" action="remove-friend.php">
<input type="hidden" name = "id" value= "<?php echo $_GET['id'];?>">
<button type = "submit" class = "btn btn-primary">Xóa Kết Bạn</button>
</form>

<?php else: ?>
<?php  if($isfollowing && !$isfollower) : ?>
<form method = "POST" action="remove-friend.php">
<input type="hidden" name = "id" value= "<?php echo $_GET['id'];?>">
<button type = "submit" class = "btn btn-primary">Hủy Kết Bạn</button>
</form>
<?php endif; ?>


<?php  if(!$isfollowing && $isfollower) : ?>
<form method = "POST" action="remove-friend.php">
<input type="hidden" name = "id" value= "<?php echo $_GET['id'];?>">
<button type = "submit" class = "btn btn-primary">Hủy Kết Bạn</button>
</form>

<form method = "POST" action="add-friend.php">
<input type="hidden" name = "id" value= "<?php echo $_GET['id'];?>">
<button type = "submit" class = "btn btn-primary">Đồng Ý Kết Bạn</button>
</form>
<?php endif; ?>


<?php if(!$isfollower && !$isfollowing): ?>
<form method = "POST" action="add-friend.php">
<input type="hidden" name = "id" value= "<?php echo $_GET['id'];?>">
<button type = "submit" class = "btn btn-primary">Gửi Yêu Cầu Kết Bạn</button>
</form>

<?php endif; ?>  
<?php endif; ?>
<?php include 'footer.php' ?>