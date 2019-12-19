<?php 
require_once 'init.php';
if ($currentUser) {
   $newFeeds = getNewFeeds();
   $userName = $currentUser['fullname'];
}

if(isset($_POST['add'])) {
    echo "sfafasf";
}

?>
<?php include 'InHeader.php' ?>

<?php if ($currentUser) : ?>


<div class="row" style="margin: 2vw 0 2vw 0">
    <div class="col-3"></div>
    <div class="col-6">
        <label for="content">
            <h1>Tạo Bài Viết</h1>
        </label>
        <form action="post.php" method="POST">
            <div class="form-group">
                <textarea class="form-control" name='content' id="content" rows="3" data-toggle="modal"
                    data-target="#Modal"></textarea>
                <?php include "post.php"?>
        </form>
    </div>
    <div class="col-3"></div>
</div>
<?php foreach ($newFeeds as $post) :  ?>
<div class="card" style="margin: 2vw;">
    <div class="card-body">
        <h5 class="card-title">
            <div class="row">
                <div class="col">
                    <?php if ($post['userHasAvatar']) : ?>
                    <img class="avatar" src="./IMG/<?php echo $post['userId'] ?>.jpg">
                    <?php else : ?>
                    <img class="avatar" src="no-avatar.jpg">

                    <?php endif; ?>
                </div>
                <div class="col-11">
                    <?php echo $post['userFullname'] ?>
                </div>
            </div>
        </h5>
        <p class="card-text">
            <p><?php echo $post['content'] ?></p>
            <small>Đăng lúc: <?php echo $post['createdAt'] ?></small>
        </p>
        <div class="row">
            <a class="nav-link" onclick="arata_ascunde(this);">
                <i class="far fa-heart"></i>
            </a>
            <a class="nav-link" href="index.php">
                <i class="far fa-comment"></i>
            </a>
            <a class="nav-link" href="index.php">
                <i class="far fa-paper-plane"></i>
            </a>
        </div>
        <div id="dynamic_field">
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="comment" placeholder="Add a comment...">
            <div method="post">
                <button type="button" name="add" id="add" class="btn btn-success">POST</button>
            </div>
        </div>
    </div>
</div>
</div>
<?php endforeach; ?>
<?php else: ?>

<?php endif ?>
<?php include 'footer.php' ?>

<script>

function arata_ascunde(button) {
   if ($(button).text().trim() == 'Show') {
     $(button).html($('<i/>',{class:'far fa-heart'})).append('Hide');
     x.fadeIn();
    }
    else {
      $(button).html($('<i/>',{class:'far fa-heart'})).append(' Show');
      x.fadeOut();
    }
}

// function msg() {
//     echo "afasf";
//     // createComment($post['id'],$currentUser['id'],$tittle);
// }

var javaScriptVar = "<?php echo $userName; ?>";
$(document).ready(function() {
    var i = 1;
    // var comment = document.getElementById("comment").value ;
    // createComment($post['id'],$currentUser['id'],comment);
    // var x = document.getElementById("comment").value
    // if (document.getElementById("comment").value.length == 0) {
    $('#add').click(function() {
        i++;
        $('#dynamic_field').append('<p style="font-size: 12px;">' + '<b>' + javaScriptVar +
            ' </b>' + document.getElementById("comment").value + '</p>');
        document.getElementById('comment').value = ''

        $.ajax({
            url: "fetch.php",
            method: "POST",
            cache: false,
            success: function(response) {
                /* invoke your function*/
                createComment($post['id'],$currentUser['id'],document.getElementById("comment").value);
            }
        });
    });
    // }

});
</script>