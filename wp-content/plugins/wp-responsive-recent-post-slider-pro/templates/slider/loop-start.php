<?php
/**
 * Template for WP Responsive Recent Post Slider Pro Loop - Start
 *
 * This template can be overridden by copying it to yourtheme/wp-responsive-recent-post-slider-pro/slider/loop-start.php
 *
 * @package WP Responsive Recent Post Slider Pro
 * @version 1.3.7
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>

<div class="wprpsp-pro-slider-wrp wprpsp-clearfix <?php echo $extra_class; ?>" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>">
	<div id="wprpsp-pro-slider-<?php echo $unique; ?>" class="<?php echo $slider_cls; ?>" <?php echo $slider_as_nav_for; ?>>