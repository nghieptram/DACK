


<?php
require_once 'init.php';
$friends = getFriends($currentUser['id']);
// var_dump($friends);
?>
<?php include 'header.php' ?>
<h4>Danh sách bạn bè</h4>
<a  href="userprofile.php" > <p> Quay lại </p> </a>
<ul>
  <?php foreach ($friends as $friend) : ?>
  <li>
    <a href="profile.php?id=<?php echo $friend['id']; ?>"><?php echo $friend['fullname'] ?></a>
  </li>
  <?php endforeach; ?>
</ul>
<?php include 'footer.php' ?>