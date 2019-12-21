<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 1600;
$thumb_height = 570;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>


<div class="banner">
	<ul>
	<?php
	for ($i=0; $i<$list_count; $i++) {
		$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

		if($thumb['src']) {
			$img = $thumb['src'];
		} else {
			$img = G5_IMG_URL.'/no_img.png';
			$thumb['alt'] = '이미지가 없습니다.';
		}
		$link_name = $list[$i]['wr_link1'];
		$lik_url = str_replace("[_DOMAIN_]", G5_URL, $list[$i]['wr_link2']);
	?>
		<li style="background-image:url('<?php echo $img; ?>');">
			<div class="container">
				<div class="banner-content">
					<div class="banner-subject">
						<?php echo $list[$i]['subject']; ?>					
					</div>
					<div class="banner-description">
						<?php echo nl2br($list[$i]['wr_content']); ?>
					</div>
					<div class="banner-button">
						<a href="<?php echo $lik_url; ?>"><button><?php echo $link_name; ?></button></a>
					</div>
				</div> <!-- banner-content -->
				<div class="banner-icon hidden-xs">
				</div>
			</div> <!-- container -->
		</li>
	<?php
	}
	?>
	</ul>
</div>
<script>
$(".banner ul").bxSlider();
</script>