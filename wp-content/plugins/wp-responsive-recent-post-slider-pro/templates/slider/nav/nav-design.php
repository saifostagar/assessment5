<?php
/**
 * Template for WP Responsive Recent Post Slider Pro - Nav Design
 *
 * This template can be overridden by copying it to yourtheme/wp-responsive-recent-post-slider-pro/slider/nav/nav-design.php
 *
 * @package WP Responsive Recent Post Slider Pro
 * @version 1.3.7
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post; ?>

<div class="wprpsp-recent-post-nav-<?php echo $unique; ?> wprpsp-recent-post-nav wprpsp-<?php echo $design; ?> wprpsp-medium-4 wprpsp-columns">
	<?php while ( $query->have_posts() ) : $query->the_post(); 
		$nav_thumb_img = wprpsp_get_post_featured_image( $post->ID, array(80, 80) ); 
	?>
		<div class="wprpsp-post-nav-loop">
			<?php if( !empty($nav_thumb_img) ) { ?>
				<img <?php if($lazyload) { ?>data-lazy="<?php echo esc_url($nav_thumb_img); ?>" <?php } ?> src="<?php if(empty($lazyload)) { echo esc_url($nav_thumb_img); } ?>" alt="<?php the_title_attribute(); ?>" height="80" width="80" />
			<?php } else { ?>
				<div class="wprpsp-post-noimg"></div>
			<?php } ?>

			<span class="wprpsp-block-right-content">
				<span class="wprpsp-block-right-title"><?php echo wprpsp_limit_words( get_the_title(), 6 ); ?></span>
				<?php if($show_date) { ?>
				<span class="wprpsp-post-date"><?php echo get_the_date(); ?></span>
				<?php } ?>
			</span>
		</div>
	<?php endwhile; ?>
</div>