<!-- <?php
    while($row =mysqli_fetch_assoc($result)){
        echo '<p>' . $row[$dem]. '</p>';
    }
?> -->
<?php $dem=0; foreach ($newFeeds as $post) :  ?>
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
    <?php $dem = $dem + $dem;?>
<?php endforeach; ?>