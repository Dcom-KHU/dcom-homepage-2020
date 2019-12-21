<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');

add_javascript('<script src="'.G5_JS_URL.'/jquery.bxslider.js"></script>', 10);
?>
<!-- 상단 시작 { -->
<div class="wrapper">
	<div class="header">
		<div class="container">
			<div class="top row">
				<div class="left logo">
					<a href="<?php echo G5_URL; ?>"><img src="<?php echo G5_THEME_URL; ?>/img/logo.png"></a>
				</div>
				<div class="nav">
					<div class="visible-xs mobile-menu-top">
						Menu
					</div>
					<ul>
						<?php
						$menu_datas = get_menu_db(0, true);
						foreach( $menu_datas as $row ){
							if( empty($row) ) continue;
							$row['me_link'] = str_replace("[_DOMAIN_]", G5_URL, $row['me_link']);
						?>
						<li>
							<a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"><?php echo $row['me_name'] ?></a>
							<?php
							$k = 0;
							foreach( (array) $row['sub'] as $row2 ){

								if( empty($row2) ) continue; 

								if($k == 0)
									echo '<ul class="dropdown">'.PHP_EOL;
							?>
								<li><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name'] ?></a></li>
							<?php
							$k++;
							}   //end foreach $row2

							if($k > 0)
								echo '</ul>'.PHP_EOL;
							?>
						</li>
						<?php
						$i++;
						}   //end foreach $row
						?>
						<?php if($is_member) { ?>
						<li><a href="<?php echo G5_URL; ?>/bbs/logout.php">Sign Out</a></li>
						<?php } else { ?>
						<li><a href="<?php echo G5_URL; ?>/bbs/login.php">Sign In</a></li>
						<?php } ?>
					</ul>
				</div> <!-- nav -->
				<div class="mobile-menu visible-xs">
					<button><i class="fas fa-bars"></i></button>
				</div>
			</div> <!-- top -->
		</div> <!-- container -->
	</div> <!-- header-->
	<div class="content">
		<?php echo latest('theme/main_banner', 'main_banner', 10, 23); ?>