<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}
?>
		</div> <!-- container -->
	</div> <!-- content -->
		<div class="footer">
			<div class="footer-menu">
				<div class="container">
					<div class="row">
						<ul>
							<li><a href="privacy.html">개인정보처리방침</a></li>
							<li><a href="policy.html">이용약관</a></li>
							<li><a href="#link-noemail">이메일무단수집거부</a></li>
						</ul>
					</div> <!-- row -->
				</div> <!-- container -->
			</div> <!-- footer-menu -->
			<div class="container">
				<div class="footer-logo hidden-xs">
					<img src="<?php echo G5_THEME_URL; ?>/img/footer_logo.png">
				</div>
				<div class="footer-logo visible-xs">
					<img src="<?php echo G5_THEME_URL; ?>/img/footer_logo_mobile.png">
				</div>
				<div class="footer-copyright">
					Copyright &copy; <strong>D.Com</strong>. All rights reserved.
				</div>
			</div> <!-- container -->
		</div> <!-- footer -->
	</div> <!-- wrapper -->
	<div class="mobile-menu-mask" style="display:none;"></div>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>