<?php 
require_once 'init.php';
if ($currentUser) {
    // $newFeeds = getNewFeeds();
    $newFeeds = getNewFeedsForuserId($currentUser['id']);
  }
  if (!$currentUser) {
    // $newFeeds = getNewFeeds();
    header('location: FormLogin.php');
  }
?>



<?php include 'InHeader.php' ?>

<style>
ul a li:hover {
  background-color: royalblue;
  border-radius: 2vw 1vw 1vw 2vw;

}
</style>
<div style="background: #fafafa">
    <div class="row" style="margin: 0 0 2vw 0">
        <div class="col-1"></div>

        <div class="col-7">
            <form action="post.php" method="POST">
                <div class="form-group">
                    <div style="background: #f5f6f7; border-radius: 1vw 1vw 1vw 1vw; padding: 0 1vw 1vw 1vw;">
                    <h4 style="font-family: Arial;; margin-top: 2vw; padding-top: 1vw">Tạo Bài Viết</h4>
                    <textarea class="form-control" name='content' id="content" rows="3" data-toggle="modal"
                        data-target="#Modal"></textarea>
                    </div>
                    <?php include "post.php"?>
                </div>
            </form>
                <!-- <?php include "pagination.php"?> -->
                <!-- repost -->
                <?php include "shownew.php"?>
                <!-- repost -->
        </div>
        <div class="pagination">
                <?php include "showpagination.php"?>
                </div>
</div>
</div>


<div class="col-3" style="background: #f5f6f7; border-radius: 1vw 1vw 1vw 1vw; margin-top: 2vw; margin-bottom: 5vw">
    <h4 style="text-align: center; margin-top: 1vw; margin-bottom: 3vw">Danh Sách Bạn Bè</h4>
        <?php
        require_once 'init.php';
        $friends = getFriends($currentUser['id']);
        ?>
        <ul style="list-style: none;">
        <?php foreach ($friends as $friend) : ?>
            <a href="profile.php?id=<?php echo $friend['id']; ?>" style="text-decoration: none; color: black;">
            <li style="margin-bottom: 1vw;">
                <div class="row">
                <div class="col-3" style="margin-right: 0">
                <img class="avatar"
                src="<?php echo file_exists('./IMG/' . $friend['id'] . '.jpg') ? ('./IMG/' . $friend['id'] . '.jpg') : ('./IMG/0.jpg') ?>">
                </div>
                <div class="col-9" style="margin-top: 0.6vw">
                <b><?php echo $friend['fullname'] ?></b>
                </div>
            </li>
            </a>
        <?php endforeach; ?>
        </ul>

</div>
<div class="col-1"></div>
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