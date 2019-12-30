<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>

<?php echo latest('theme/main_activity', 'activity', 10, 23); ?>

<div class="row">
    <div class="col-padding col-sm-6">
        <?php echo latest('theme/main_basic', 'free', 5, 24); ?>
    </div>
    <div class="col-padding col-sm-6">
        <?php echo latest('theme/main_basic', 'free', 5, 24); ?>
    </div>
    <div class="col-padding col-sm-12">
        <?php echo latest('theme/main_basic', 'free', 5, 24); ?>
    </div>
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>