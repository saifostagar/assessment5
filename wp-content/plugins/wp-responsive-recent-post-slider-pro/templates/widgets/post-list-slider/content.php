<?php
/**
 * Template for WP Responsive Recent Post Slider Pro Loop - widgets
 *
 * This template can be overridden by copying it to yourtheme/wp-responsive-recent-post-slider-pro/widgets/post-list-slider/content.php

 *
 * @package WP Responsive Recent Post Slider Pro
 * @version 1.3.7
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} 

global $post; ?>

<div class="wprpsp-post-grid wprpsp-post-slides">
	<div class="wprpsp-post-image-wrap wprpsp-post-img-bg <?php echo $no_img_cls; ?>">
		<?php if( !empty($feat_image) ) { ?>
			<a  href="<?php echo esc_url( $post_link ); ?>" target="<?php echo $link_target; ?>">
				<img class="wprpsp-post-img" <?php if($lazyload) { ?>data-lazy="<?php echo esc_url($feat_image); ?>" <?php } ?> src="<?php if(empty($lazyload)) { echo esc_url($feat_image); } ?>" alt="<?php the_title_attribute(); ?>" />
			</a>
		<?php }
		if($show_category && $cat_list) { ?>
			<div class="wprpsp-post-cats-wrap"><?php echo $cat_list; ?></div>
		<?php } ?>
	</div>
	<div class="wprpsp-post-grid-cnt">
		<div class="post-content">
			<div class="wprpsp-post-title">
				<a href="<?php echo esc_url( $post_link ); ?>" target="<?php echo $link_target; ?>"><?php the_title(); ?></a>
			</div>
			<?php if( $show_content ) { ?>
				<div class="wprpsp-post-desc">
					<?php echo wprpsp_get_post_excerpt( $post->ID, get_the_content(), $content_words_limit, $content_tail ); ?>
				</div>
			<?php }
			if( $date ) { ?>
				<div class="wprpsp-post-date"><?php echo get_the_date(); ?></div>
			<?php } ?>
		</div>
	</div>
</div>