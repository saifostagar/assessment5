<?php
/**
 * Template for WP Responsive Recent Post Slider Pro Loop - Design-5
 *
 * This template can be overridden by copying it to yourtheme/wp-responsive-recent-post-slider-pro/gridbox/design-5.php
 *
 * @package WP Responsive Recent Post Slider Pro
 * @version 1.3.7
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

$grid_box_count 	= ( $count % 3 );
$grid_box_count 	= !empty( $grid_box_count ) ? $grid_box_count : 3;
$image_height 		= (!empty($image_height)) 	? $image_height : '500';
$dynamic_height 	= (($count % 3) == 1) 	? $image_height : (($image_height/2)-2);
$height_css 		= ($dynamic_height) 		? 'height:'.$dynamic_height.'px;' : '';
$dynamic_class 		= ( ($count % 3) == 1) ? 'wprpsp-medium-8' : 'wprpsp-medium-4';

if( ( $count % 3 ) == 1 ) { ?>
	<div class="wprpsp-grid-slider-wrp">
<?php } ?>
		<div class="wprpsp-post-slides wprpsp-clr-<?php echo $grid_box_count; ?> <?php echo $dynamic_class; ?> wprpsp-columns">
			<a class="wprpsp-link-overlay wprpsp-post-link" href="<?php echo esc_url($post_link); ?>" target="<?php echo $link_target; ?>"></a>
			<div class="wprpsp-post-grid-cnt">
				<div class="wprpsp-post-overlay">
					<div class="wprpsp-post-image-wrap wprpsp-post-image-bg" style="<?php echo $height_css; ?>">
						<?php if( !empty($feat_image) ) { ?>
							<img class="wprpsp-post-img" <?php if($lazyload) { ?>data-lazy="<?php echo esc_url($feat_image); ?>" <?php } ?> src="<?php if(empty($lazyload)) { echo esc_url($feat_image); } ?>" alt="<?php the_title_attribute(); ?>" />
						<?php } ?>
					</div>
					<div class="wprpsp-post-short-cnt">
						<?php if($show_category_name && $cat_list) { ?>
							<div class="wprpsp-post-cats-wrap"><?php echo $cat_list; ?></div>
						<?php } ?>

						<div class="wprpsp-bottom-content">
							<?php if($recent_post_title) { ?>
								<h2 class="wprpsp-post-title">
									<a href="<?php echo esc_url($post_link); ?>" target="<?php echo $link_target; ?>"><?php echo $recent_post_title; ?></a>
								</h2>
							<?php } 
							if($show_date || $show_author) { ?>
								<div class="wprpsp-post-date">		
									<?php if($show_author) { ?> <span><?php  esc_html_e( 'By', 'wp-responsive-recent-post-slider' ); ?> <?php the_author(); ?></span><?php } ?>
									<?php echo ($show_author && $show_date) ? '&nbsp;/&nbsp;' : '' ?>
									<?php if($show_date) { echo get_the_date(); } ?>
								</div>
							<?php } 
							if($show_content) { ?>
								<div class="wprpsp-post-content">
									<div><?php echo wprpsp_get_post_excerpt( $post->ID, get_the_content(), $content_words_limit, $content_tail ); ?></div>
								</div>
							<?php } ?> 
						</div>
					</div>
				</div>
			</div>
		</div>
<?php if( ( $count % 3 ) == 0 || ( $post_count == $count ) ) { ?>
</div>
<?php } ?>