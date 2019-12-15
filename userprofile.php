<?php
require_once 'init.php';
if (!$currentUser) {
  header('Location: index.php');
  exit();
}
?>
<?php include 'Header.php'; ?>
<?php if (isset($_POST['fullname']) && isset($_POST['phone'])): ?>
<?php 
$fullname = $currentUser['fullname'];
$phone = $currentUser['phone'];
$success = true;
?>
<?php if (!$success) : ?>
<?php header('Location: index.php') ?>
<?php endif; ?>
<?php else: ?>
<div class="row" id="main">
    <img id="avatar"
        src="<?php echo file_exists('./IMG/' . $currentUser['id'] . '.jpg') ? ('./IMG/' . $currentUser['id'] . '.jpg') : ('./IMG/0.jpg') ?>">
    <div>
        <strong id="name"><?php echo $currentUser['fullname'] ?></strong>
        <button class="button">
            Edit Profile
        </button>
        <button class="iconSetting"><i class="fas fa-ellipsis-v"></i></button>
        <br>
    </div>
    <br>
</div>
</div>
</div>
<?php endif; ?>
<?php include 'Footer.php'; ?>
