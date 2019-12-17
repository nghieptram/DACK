<?php
require_once 'init.php';
$friendship = getFriends($currentUser['id']);

// var_dump($friends);
?>
<?php include 'InHeader.php' ?>
<h1>Danh sách bạn bè</h1>
<ul>
  <?php foreach ($friendship as $friend) : ?>
  <li>
    <a href="profile.php?id=<?php echo $friend['id']; ?>"><?php echo $friend['fullname'] ?></a>
  </li>
  <?php endforeach; ?>
</ul>
<?php include 'footer.php' ?>