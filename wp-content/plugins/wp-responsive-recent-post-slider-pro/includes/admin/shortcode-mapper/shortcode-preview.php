<?php
/**
 * Shortcode Preview
 *
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$authenticated 			= false;
$registered_shortcodes  = wprpsp_registered_shortcodes();

// Getting shortcode value
if( !empty( $_POST['wprpsp_customizer_shrt'] ) ) {
	$shortcode_val = wprpsp_pro_clean( $_POST['wprpsp_customizer_shrt'] );
} elseif ( !empty($_GET['shortcode']) && isset( $registered_shortcodes[ $_GET['shortcode'] ] ) ) {
	$shortcode_val = '['.$_GET['shortcode'].']';
} else {
	$shortcode_val = '';
}

// For authentication so no one can use page via URL
if( isset($_SERVER['HTTP_REFERER']) ) {
	$url_query  = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_QUERY);
	parse_str( $url_query, $referer );

	if( !empty($referer['page']) && $referer['page'] == 'wprpsp-shrt-mapper' ) {
		$authenticated = true;
	}
}

// Check Authentication else exit
if( !$authenticated ) {
	wp_die( __('Sorry, you are not allowed to access this page.', 'wp-responsive-recent-post-slider') );
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="Imagetoolbar" content="No" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php _e("Shortcode Preview", "wp-responsive-recent-post-slider"); ?></title>

		<?php wp_print_styles('common'); ?>
		<link rel="stylesheet" href="<?php echo WPRPSP_URL; ?>assets/css/slick.css?ver=<?php echo WPRPSP_VERSION; ?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo WPRPSP_URL; ?>assets/css/wprpsp-public.min.css?ver=<?php echo WPRPSP_VERSION; ?>" type="text/css" />
		<?php do_action( 'wprpsp_shortcode_preview_head', $shortcode_val ); ?>

		<style type="text/css">
			body{background: #fff; overflow-x: hidden;}
			.wprpsp-customizer-container{padding:0 16px;}
			.wprpsp-customizer-container a[href^="http"]{cursor:not-allowed !important;}
			a:focus, a:active{box-shadow: none; outline: none;}
			.wprpsp-link-notice{display: none; position: fixed; color: #a94442; background-color: #f2dede; border:1px solid #ebccd1; max-width:300px; width: 100%; left:0; right:0; bottom:30%; margin:auto; padding:10px; text-align: center; z-index: 1050;}
		</style>
		<?php wp_print_scripts( array('jquery') ); ?>
	</head>
	<body>
		<div id="wprpsp-customizer-container" class="wprpsp-customizer-container">
			<?php if( $shortcode_val ) {
				echo do_shortcode( $shortcode_val );
			} ?>
		</div>
		<div class="wprpsp-link-notice"><?php _e('Sorry, You can not visit the link in preview', 'wp-responsive-recent-post-slider'); ?></div>
		<script type='text/javascript'>
		//<![CDATA[
		var Wprpsp = <?php echo wp_json_encode(array(
														'is_mobile'			=> (wp_is_mobile())		? 1 : 0,
														'is_rtl'			=> (is_rtl())			? 1 : 0,
														'is_old_browser'	=> wprpsp_old_browser() ? 1 : 0,
													)); ?>;
		//]]>
		</script>
		<script type="text/javascript" src="<?php echo WPRPSP_URL; ?>assets/js/slick.min.js?ver=<?php echo WPRPSP_VERSION; ?>"></script>
		<script type="text/javascript" src="<?php echo WPRPSP_URL; ?>assets/js/wprpsp-public.min.js?ver=<?php echo WPRPSP_VERSION; ?>"></script>
		<?php do_action( 'wprpsp_shortcode_preview_footer', $shortcode_val ); ?>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(document).on('click', 'a', function(event) {

				var href_val = $(this).attr('href');

				if( href_val.indexOf('javascript:') < 0 ) {
					$('.wprpsp-link-notice').fadeIn();
				}
				event.preventDefault();

				setTimeout(function() {
					$(".wprpsp-link-notice").fadeOut('normal');
				}, 4000 );
			});
		});
		</script>
	</body>
</html>