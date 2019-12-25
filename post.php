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
    header('Location: index.php');
  } else {
    createPost($currentUser['id'], $content);
    header('Location: index.php');
  
    exit();
  }
}
?>

<?php if (!$success) : ?>
<div class="alert alert-danger" role="alert">
    Nội dung không được rỗng và dài quá 1024 ký tự!
</div>
<?php endif; ?>

<div class="row" style="margin: 2vw 0 2vw 0">
    <!-- <div class="col-3"></div>
    <div class="col-6"> -->
        <form method="POST">
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 40vw;">
                        <div class="modal-body">
                            <div class="form-group">
                                <textarea class="form-control" id="content" name="content" rows="3"
                                    placeholder="Bạn đang nghĩ gì?"></textarea>
                            </div>
                            <div style="text-alight: center">
                                <button type="button" class="btn btn-outline-primary"
                                    style="margin-right: 2vw; margin-left: 5vw">Hình Ảnh</button>
                                <button type="button" class="btn btn-outline-secondary" style="margin-right: 2vw">Cảm
                                    Xúc</button>
                                <button type="button" class="btn btn-outline-success">Check In</button>
                            </div>

                            <div class="dropdown btn-group" style="float: right">
                                <select class="btn btn-link-x dropdown-toggle" id="privacy" name="privacy">
                                    <option selected value="Công Khai"> Công Khai</option>
                                    <option value="Bạn Bè"> Bạn Bè</option>
                                    <option value="Chỉ Mình tôi"> Chỉ Mình Tôi</option>
                                </select>

                            </div>
                            <div style="text-align: center; clear: both; margin-top: 2vw">
                                <button type="submit" class="btn btn-primary">Đăng Bài</button>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        </form>