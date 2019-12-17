
<?php
require_once 'init.php';
$friendship = getFriends($currentUser['id']);

// var_dump($friends);
?>
<?php include 'InHeader.php' ?>
<div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 40vw;">
                <div class="modal-body">
<div style="text-align: center;">
<h1>Danh Sách Bạn Bè</h1>
</div>
<ul>
  <?php foreach ($friendship as $friend) : ?>
  <li>
  
    <a href="profile.php?id=<?php echo $friend['id']; ?>"><?php echo $friend['fullname'] ?></a>
  </li>
  <?php endforeach; ?>
</ul>

</div>
</div>
</div>
<?php include 'footer.php' ?>