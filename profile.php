<?php
session_start();
include('./includes/db.php');
if(!isset($_SESSION['first'])){
	header('location: ./login.php');
}
include('./template-part/main_header.php') ;
$full_name = $_SESSION['first'].' '.$_SESSION['last'];
$login_user_pic = $_SESSION['image'];
?>
    <!---Add post section start--->
<?php include('./template-part/add_post_form.php') ?>
    <!---Add post section end--->
    <!---profile main section start--->
    <section>
        <div class="main-content flex justify-content-space-between post-area">
        <?php
            $all_post = mysqli_query($conn,"SELECT * FROM user_post WHERE user_name='$full_name' ORDER BY id DESC");
            $post_num = mysqli_num_rows($all_post);
            if($post_num > 0):
            while ($post = mysqli_fetch_array($all_post)):
                $post_id = $post['id'];
            ?>
            <div class="post">
                <div class="autor-info flex align-items-center" style="position: relative;">
                    <img class="autor-img" src="./img/<?php echo $post['user_picture'] ?>" alt="<?php echo $post['user_name'] ?>">
                    <div>
                        <h4 class="author-title"><span class="author-title"><?php echo $post['user_name'] ?></span></h4>
                        <p><?php echo $post['post_date'] ?></p>
                    </div>
                    <div class="action-buttons">
                        <button>&#x022F3;</button>
                        <button>&#10539;</button>
                    </div>
                </div>
                <img src="img/post/<?php echo $post['post_image'] ?>"
                    alt="<?php echo $post['post_title'] ?>">
                <h2 class="title"><?php echo $post['post_title'] ?></h2>
                <p><?php echo $post['post_content'] ?></p>
                <div class="comment-form flex align-items-center">
                    <img class="autor-img" src="./img/<?php echo $login_user_pic; ?>" alt="<?php echo $full_name; ?>">
                    <form class="flex" style="width: 100%" action="includes/comment.php" method="POST">
                        <input type="text" name="comment" placeholder="Leave a comment" style="width: 100%" required>
                        <input type="hidden" name="comment-postid" value="<?php echo $post_id; ?>" />
                        <button class="primary_btn" type="submit">&#8620;</button>
                    </form>
                </div>
                <hr />
                <?php
                $all_comment = mysqli_query($conn,"SELECT * FROM user_comment WHERE comment_post_id='$post_id' ORDER BY id DESC");
                while ($comm_fetch = mysqli_fetch_array($all_comment) ): ?>
                <div class="comments flex align-items-center">
                    <img class="autor-img" src="./img/<?php echo $comm_fetch['user_pic']; ?>" alt="<?php echo $comm_fetch['user_name']; ?>">
                    <div>
                        <h4 class="author-title"><span><?php echo $comm_fetch['user_name']; ?></span></h4>
                        <p><?php echo $comm_fetch['comment']; ?></p>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endwhile; ?>
            <?php else: ?>
                <?php include('./template-part/no_post_found.php') ?>
            <?php  endif; ?>
        </div>
    </section>
    <!---profile main section end--->
    <?php include('./template-part/main_footer.php') ?>
    