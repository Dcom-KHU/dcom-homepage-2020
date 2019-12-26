<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
add_javascript('<script src="'.$latest_skin_url.'/jquery.touchSwipe.min.js"></script>', 0);
$thumb_width = 250;
$thumb_height = 200;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<div class="latest-main-activity">
	<h2 class="section-header">
		활동내역
	</h2>
	<div class="more">
		<a href="<?php echo get_pretty_url($bo_table); ?>">
			<span class="sound_only"><?php echo $bo_subject ?></span>
			더보기
		</a>
	</div>
	<div class="latest-main-activity-list">
		<ul class="row">
		<?php
		for ($i=0; $i<$list_count; $i++) {
			
			$img_link_html = '';
			
			$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

			if($thumb['src']) {
				$img = $thumb['src'];
			} else {
				$img = G5_THEME_URL.'/img/no_img_250x200.png';
				$thumb['alt'] = '이미지가 없습니다.';
			}
			$img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
			$img_link_html = '<a href="'.$list[$i]['href'].'" class="lt_img" >'.$img_content.'</a>';

			switch($list[$i]['ca_name']) {
				case '공지':
					$ca_num = 1;
					break;
				case '행사':
					$ca_num = 2;
					break;
				case '대회':
					$ca_num = 3;
					break;
				case '프젝':
					$ca_num = 4;
					break;
				default:
					$ca_num = 99;
			}
		?>
			<li class="col-xs-6 col-sm-4 col-lg-3">
				<div class="inner">
					<div class="thumbnail">
						<?php echo $img_link_html; ?>
					</div>
					<div class="list-content">
					<?php if(!empty($list[$i]['ca_name'])) { ?>
						<span class="category category-<?php echo $ca_num; ?>">
							<a href="<?php echo $list[$i]['href']; ?>"><?php echo $list[$i]['ca_name']; ?></a>
						</span>
					<?php } ?>
						<span class="title <?php if(!empty($list[$i]['ca_name'])) echo 'using-category'; ?>">
							<a href="<?php echo $list[$i]['href']; ?>"><?php echo $list[$i]['subject']; ?></a>
						</span>
					</div>
				</div>
			</li>
		<?php
		}
		?>
		</ul>
		<div class="hidden-xs slide slide-left">
			<button><i class="fa fa-caret-left"></i></button>
		</div>
		<div class="hidden-xs slide slide-right">
			<button><i class="fa fa-caret-right"></i></button>
		</div>
	</div> <!-- latest-main-activity-list -->
</div> <!-- latest-main-activity -->

<script>
$(function() {
	processing_latest_main_activity_list = false;

	function slide_gallery_left() {
		if(processing_latest_main_activity_list) return;
		
		var $element = $(".latest-main-activity-list ul");
		var item_width = $("li", $element).width() + 30;
		var current_scroll = $element.scrollLeft();

		if(current_scroll <= 0)
			return;

		var to_scroll = Math.max(current_scroll - item_width, 0);

		processing_latest_main_activity_list = true;
		$element.animate({scrollLeft:to_scroll}, 300, function() {
			processing_latest_main_activity_list = false;
		});
	}

	function slide_gallery_right() {
		if(processing_latest_main_activity_list) return;
		
		var $element = $(".latest-main-activity-list ul");
		var item_width = $("li", $element).width() + 30;
		var current_scroll = $element.scrollLeft();

		var to_scroll = current_scroll + item_width;

		processing_latest_main_activity_list = true;
		$element.animate({scrollLeft:to_scroll}, 300, function() {
			processing_latest_main_activity_list = false;
		});
	}

	$(".latest-main-activity .slide-left button").click(slide_gallery_left);
	$(".latest-main-activity .slide-right button").click(slide_gallery_right);
	$(".latest-main-activity-list ul").swipe({
		swipeLeft:slide_gallery_right,
		swipeRight:slide_gallery_left
    });
});
</script>