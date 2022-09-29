<?php
/**
 * Template for WP Responsive Recent Post Slider Pro Loop - Design-1
 *
 * This template can be overridden by copying it to yourtheme/wp-responsive-recent-post-slider-pro/slider/design-1.php
 *
 * @package WP Responsive Recent Post Slider Pro
 * @version 1.3.7
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post; ?>

<div class="wprpsp-post-slides">

	<div class="wprpsp-post-cnt-pos">
		<div class="wprpsp-post-cnt-left wprpsp-medium-8 wprpsp-columns">
			<?php if($show_category_name && $cat_list) { ?>
				<div class="wprpsp-post-cats-wrap"><?php echo $cat_list; ?></div>
			<?php }
			if($recent_post_title) { ?>
				<h2 class="wprpsp-post-title">
					<a href="<?php echo esc_url($post_link); ?>" target="<?php echo $link_target; ?>"><?php echo $recent_post_title; ?></a>
				</h2>
			<?php } 
			if($show_date || $show_author) { ?>
				<div class="wprpsp-post-date">
					<?php if($show_author) { ?>
						<span>
							<?php esc_html_e( 'By', 'wp-responsive-recent-post-slider' ); ?>
							<?php the_author(); ?>
						</span>
					<?php } ?>
					<?php echo ($show_author && $show_date) ? '&nbsp;/&nbsp;' : '' ?>
					<?php if($show_date) { echo get_the_date(); } ?>
				</div>
			<?php } ?>
			<?php if($show_content) { ?>
				<div class="wprpsp-post-content">
					<div>
						<?php echo wprpsp_get_post_excerpt( $post->ID, get_the_content(), $content_words_limit, $content_tail ); ?>
					</div>
					<?php if($show_read_more) { ?>
						<a class="wprpsp-read-more-btn" href="<?php echo esc_url($post_link); ?>" target="<?php echo $link_target; ?>" ><?php esc_html_e($read_more_text); ?></a>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
		<div class="wprpsp-post-image-wrap wprpsp-post-image-bg" <?php echo $slider_height_css; ?>>
			<?php if( !empty($feat_image) ) { ?>
				<img class="wprpsp-post-img" <?php if($lazyload) { ?>data-lazy="<?php echo esc_url($feat_image); ?>" <?php } ?> src="<?php if(empty($lazyload)) { echo esc_url($feat_image); } ?>" alt="<?php the_title_attribute(); ?>" />
			<?php } ?>
		</div>
		<a class="wprpsp-post-link" href="<?php echo esc_url($post_link); ?>" target="<?php echo $link_target; ?>"></a>
	</div>
</div>