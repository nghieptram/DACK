<?php
require_once 'init.php';

if (!$currentUser) {
  header('Location: index.php');
  exit();
}

$success = true;

if (isset($_POST['content'])) {
  $content = $_POST['content'];
  $len = strlen($content);

  if ($len == 0 || $len > 1024) {
    $success = false;
  } else {
    createPost($currentUser['id'], $content);
    header('Location: index.php');
  
    exit();
  }
}
?>
<?php include 'Inheader.php' ?>

<?php if (!$success) : ?>
<div class="alert alert-danger" role="alert">
  Nội dung không được rỗng và dài quá 1024 ký tự!
</div>
<?php endif; ?>

<div class="row" style="margin: 2vw 0 2vw 0">
<div class="col-3"></div>
<div class="col-6">
<form method="POST">

  <div class="form-group">
    <textarea class="form-control" id="content" name="content" rows="3" placeholder="Bạn đang nghĩ gì?"></textarea>
  </div>
  <button type="button"  class="btn btn-outline-primary">Hình Ảnh</button>
        <button type="button" class="btn btn-outline-secondary">Cảm Xúc</button>
        <button type="button" class="btn btn-outline-success">Check In</button>
  <div class="card-footer">
    <div class="btn-toolbar justify-content-between">
        <div class="btn-group">
        </div>                                             
         <div class="dropdown btn-group">
            <select class="btn btn-link-x dropdown-toggle" id="privacy" name="privacy">
                <option selected value="Công Khai"> Công Khai</option>
                <option value="Bạn Bè"> Bạn Bè</option>
                <option value="Chỉ Mình tôi"> Chỉ Mình Tôi</option>
            </select>
        </div>
    </div>
</div>
  <div style="text-align: center">
  <button type="submit" class="btn btn-primary">Đăng Bài</button>
  </div>
</form>
<?php include 'footer.php' ?>