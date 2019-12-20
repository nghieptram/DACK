<?php
require_once 'init.php';

if (!$currentUser) {
  header('Location: FormLogin.php');
  exit();
}
?>

<div class="modal fade" id="notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content" style="width: 40vw;">
<div class="modal-body">
    <p> thong bao </p>
</div>
</div>
</div>
</div>