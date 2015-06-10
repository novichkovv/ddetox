<?php include_once('classes/check.class.php');
include_once('header.php');
require_once('../detox/model.php');
require_once('../detox/mailing_data.php');
$user = [];
if(isset($_SESSION['jigowatt']['user_id']) && $_SESSION['jigowatt']['user_id'] != 9183) {
    $model = new model('login_users');
    $user = $model->getByField('user_id',$_SESSION['jigowatt']['user_id']);
}
if(isset($_COOKIE['user_id'])) {
    $model = new model('login_users');
    $user = $model->getByField('user_id',$_COOKIE['user_id']);
}
?>
<?php if(!$user): ?>
    <div class="alert-margin alert alert-error"><?php _e('You must be logged in or signed up to view this content. Go <a href="login.php">here</a> to Login or Sign Up.'); ?></div>
<?php endif; ?>
<?php if($user): ?>
    <?php for($i = 0; $i <= $user['sent']; $i ++): ?>
        <?php if($videos[$i]): ?>
            <?php
            $video = str_replace('https://www.youtube.com/watch?v=','',$videos[$i]);
            $video = str_replace('&list=UUxObFUbx4nYwWVCelOUQtKA','',$video);
            ?>
            <div class="row" style="text-align: center;">
                <h4><p>Dr. Colbert will be posting videos to aid in your detox process</p></h4>
            </div>
            <div class="row">
                <div class="span12 vid_div">
                    <h2><?php echo $subjects[$i]; ?></h2>
                    <iframe class="hidden-phone hidden-tablet" width="571" height="321" src="//www.youtube.com/embed/Oa4wm2ftna4" frameborder="0" allowfullscreen></iframe>
                    <iframe class="hidden-desktop hidden-phone" width="352" height="198" src="//www.youtube.com/embed/Oa4wm2ftna4" frameborder="0" allowfullscreen></iframe>
                    <iframe class="hidden-desktop hidden-tablet" width="480" height="270" src="//www.youtube.com/embed/Oa4wm2ftna4" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        <?php endif; ?>
    <?php endfor; ?>
<?php endif; ?>
<?php include_once('footer.php'); ?>
