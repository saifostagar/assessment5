<?php
/**
 * Template for WP Responsive Recent Post Slider Pro Loop - End
 *
 * This template can be overridden by copying it to yourtheme/wp-responsive-recent-post-slider-pro/slider/loop-end.php
 *
 * @package WP Responsive Recent Post Slider Pro
 * @version 1.3.7
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$nav_designs = wprpsp_slider_nav_designs();
?>

	</div>

	<?php
	// Navigation design
	if( in_array( $design, $nav_designs) ) {
		wprpsp_get_template( "slider/nav/{$design}.php", $args, null, null, 'slider/nav/nav-design.php' );
	} ?>
</div>