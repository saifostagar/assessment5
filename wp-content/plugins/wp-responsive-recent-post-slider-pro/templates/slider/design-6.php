<?php
/**
 * Template for WP Responsive Recent Post Slider Pro Loop - Design-6
 *
 * This template can be overridden by copying it to yourtheme/wp-responsive-recent-post-slider-pro/slider/design-6.php
 *
 * @package WP Responsive Recent Post Slider Pro
 * @version 1.3.7
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post; 

$grid_count = ( $count % 9 );
$grid_count = !empty( $grid_count ) ? $grid_count : 9; ?>

<div class="wprpsp-post-slides wprpsp-clr-<?php echo $grid_count; ?>">
	<div class="wprpsp-post-grid-cnt">
		<div class="wprpsp-post-overlay">
			<div class="wprpsp-medium-6 wprpsp-columns">
				<div class="wprpsp-post-image-wrap wprpsp-post-image-bg" <?php echo $slider_height_css; ?>>
					<?php if( !empty($feat_image) ) { ?>
						<img class="wprpsp-post-img" <?php if($lazyload) { ?>data-lazy="<?php echo esc_url($feat_image); ?>" <?php } ?> src="<?php if(empty($lazyload)) { echo esc_url($feat_image); } ?>" alt="<?php the_title_attribute(); ?>" />
					<?php } ?>

					<?php if($show_category_name && $cat_list) { ?>
						<div class="wprpsp-post-cats-wrap"><?php echo $cat_list; ?></div>
					<?php } ?>
				</div>
				<a class="wprpsp-post-link" href="<?php echo esc_url($post_link); ?>" target="<?php echo $link_target; ?>"></a>
			</div>
			<div class="wprpsp-medium-6 wprpsp-columns">
				<div class="wprpsp-post-short-cnt" <?php echo $slider_height_css; ?>>
					<div class="wprpsp-bottom-content">
						<?php if($recent_post_title) { ?>
			 				<h2 class="wprpsp-post-title">
								<a href="<?php echo esc_url($post_link); ?>" target="<?php echo $link_target; ?>"><?php echo $recent_post_title; ?></a>
							</h2>
						<?php } 
						if($show_date || $show_author) { ?>
							<div class="wprpsp-post-date">
								<?php if($show_author) { ?> <span><?php  esc_html_e( 'By', 'wp-responsive-recent-post-slider' ); ?> <?php the_author(); ?></span><?php }?>
								<?php echo ($show_author && $show_date) ? '&nbsp;/&nbsp;' : '' ?>
								<?php if($show_date) { echo get_the_date(); } ?>
							</div>
						<?php }
						if($show_content) { ?>
							<div class="wprpsp-post-content">
								<div><?php echo wprpsp_get_post_excerpt( $post->ID, get_the_content(), $content_words_limit, $content_tail ); ?></div>
								<?php if($show_read_more) { ?>
									<a class="wprpsp-read-more-btn" href="<?php echo esc_url($post_link); ?>" target="<?php echo $link_target; ?>"><?php esc_html_e($read_more_text); ?></a>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>