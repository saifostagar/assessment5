<?php
/**
 * Template for WP Responsive Recent Post Slider Pro Loop - widgets
 *
 * This template can be overridden by copying it to yourtheme/wp-responsive-recent-post-slider-pro/widgets/post-slider/content.php

 *
 * @package WP Responsive Recent Post Slider Pro
 * @version 1.3.7
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} 

global $post; ?>

<div class="post-slides wprpsp-post-slides">
	<div class="wprpsp-post-grid-cnt">
		<div class="wprpsp-post-overlay">
			<div class="wprpsp-post-image-wrap wprpsp-post-img-bg">
				<?php if( !empty( $feat_image ) ) { ?>
					<img class="wprpsp-post-img" <?php if($lazyload) { ?>data-lazy="<?php echo esc_url($feat_image); ?>" <?php } ?> src="<?php if(empty($lazyload)) { echo esc_url($feat_image); } ?>" alt="<?php the_title_attribute(); ?>" />
				<?php } ?>
			</div>
			<div class="wprpsp-post-short-cnt">
				<a class="wprpsp-post-link" href="<?php echo esc_url( $post_link ); ?>" target="<?php echo $link_target; ?>"></a>
				<?php if( $show_category && $cat_list ) { ?>
					<div class="wprpsp-post-cats-wrap"><?php echo $cat_list; ?></div>
				<?php } ?>
				<h2 class="wprpsp-post-title">
					<a href="<?php echo esc_url( $post_link ); ?>" target="<?php echo $link_target; ?>"><?php the_title(); ?></a>
				</h2>
				<?php if( $date ) { ?>
					<div class="wprpsp-post-date"><?php echo get_the_date(); ?></div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>