<?php
/**
 * Template for WP Responsive Recent Post Slider Pro Loop - Start
 *
 * This template can be overridden by copying it to yourtheme/wp-responsive-recent-post-slider-pro/widgets/post-slider/loop-start.php
 *
 * @package WP Responsive Recent Post Slider Pro
 * @version 1.3.7
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>

<div class="wprpsp-post-widget-wrp wprpsp-clearfix" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>">
	<div id="wprpsp-recent-post-slider-<?php echo $unique; ?>" class="<?php echo $widget_wrp_cls; ?>">