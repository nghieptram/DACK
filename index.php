<?php 
require_once 'init.php';
if ($currentUser) {
    // $newFeeds = getNewFeeds();
    $newFeeds = getNewFeedsForUserId($currentUser['id']);
  }
  if (!$currentUser) {
    // $newFeeds = getNewFeeds();
    header('location: FormLogin.php');
  }
// if ($currentUser) {
//    $newFeeds = getNewFeeds();
//    $userName = $currentUser['fullname'];
// }
// if(isset($_POST['add'])) {
//     echo "sfafasf";
// }

?>
<?php include 'InHeader.php' ?>

<?php if ($currentUser) : ?>

<div style="background: #fafafa">
<div class="row" style="margin: 0 0 2vw 0">
    <div class="col-3"></div>
    <div class="col-6">
            
        <form action="post.php" method="POST">
            <div class="form-group">
                <div style="background: #f5f6f7; border-radius: 1vw 1vw 1vw 1vw; padding: 0 1vw 1vw 1vw;">
                <h4 style="font-family: Arial;; margin-top: 2vw; padding-top: 1vw">Tạo Bài Viết</h4>
                <textarea class="form-control" name='content' id="content" rows="3" data-toggle="modal"
                    data-target="#Modal"></textarea>
                </div>
                <?php include "post.php"?>
        </form>
    </div>
    <div class="col-3"></div>
</div>

<?php include "pagination.php"?>
<!-- repost -->
<?php include "shownew.php"?>
<!-- repost -->
<div class="pagination">
<?php include "showpagination.php"?>
</div>
</div>
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
<?php endif ?>