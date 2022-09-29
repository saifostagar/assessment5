<?php
/**
 * WP Responsive Recent Post Slider Pro Shortcode Mapper Page
 *
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$registered_shortcodes 	= wprpsp_registered_shortcodes();
$preview_shortcode 		= !empty($_GET['shortcode']) ? $_GET['shortcode'] : apply_filters('wprpsp_default_shortcode_preview', 'recent_post_slider' );
$preview_url 			= add_query_arg( array( 'page' => 'wprpsp-preview', 'shortcode' => $preview_shortcode), admin_url('admin.php') );
$shrt_generator_url 	= add_query_arg( array('page' => 'wprpsp-shrt-mapper' ), admin_url('admin.php') );

// Instantiate the shortcode mapper
if( !class_exists( 'Wprpsp_Shortcode_Mapper' ) ) {
	include_once( WPRPSP_DIR . '/includes/admin/shortcode-mapper/class-wprpsp-shortcode-mapper.php' );
}

$shortcode_fields 	= array();
$shortcode_sanitize = str_replace('-', '_', $preview_shortcode);
?>
<div class="wrap wprpsp-customizer-settings">

	<h2><?php _e( 'WP Responsive Recent Post Slider Pro - Shortcode Builder', 'wp-responsive-recent-post-slider' ); ?></h2>

	<?php
	// If invalid shortocde is passed then simply return
	if( !empty($_GET['shortcode']) && !isset( $registered_shortcodes[ $_GET['shortcode'] ] ) ) {
		echo '<div id="message" class="error notice">
				<p><strong>'.__('Sorry, Something happened wrong.', 'wp-responsive-recent-post-slider').'</strong></p>
			 </div>';
		return;
	}
	?>
	<div class="wprpsp-customizer-toolbar">
		<?php if( !empty( $registered_shortcodes ) ) { ?>
			<select class="wprpsp-cust-shrt-switcher" id="wprpsp-cust-shrt-switcher">
				<option value=""><?php _e('-- Choose Shortcode --', 'wp-responsive-recent-post-slider'); ?></option>
				<?php foreach ($registered_shortcodes as $shrt_key => $shrt_val) {

					if( empty($shrt_key) ) {
						continue;
					}

					$shrt_val 		= !empty($shrt_val) ? $shrt_val : $shrt_key;
					$shortcode_url 	= add_query_arg( array('shortcode' => $shrt_key), $shrt_generator_url );
				?>
				<option value="<?php echo $shrt_key; ?>" <?php selected( $preview_shortcode, $shrt_key); ?> data-url="<?php echo esc_url( $shortcode_url ); ?>"><?php echo $shrt_val; ?></option>
				<?php } ?>
			</select>
		<?php } ?>
		<span class="wprpsp-cust-shrt-generate-help wprpsp-tooltip" title="<?php _e("The Shortcode Mapper allows you to preview plugin shortcode. You can choose your desired shortcode from the dropdown and check various parameters from left panel. \n\nYou can paste shortocde to below and press Generate button to preview so each and every time you do not have to choose each parameters!!!", 'wp-responsive-recent-post-slider'); ?>"><i class="dashicons dashicons-editor-help"></i></span>
	</div><!-- end .wprpsp-customizer-toolbar -->

	<div class="wprpsp-customizer wprpsp-clearfix" data-shortcode="<?php echo $preview_shortcode; ?>">
		<div class="wprpsp-customizer-control wprpsp-clearfix">
			<div class="wprpsp-customizer-heading"><?php _e('Shortcode Parameters', 'wp-responsive-recent-post-slider'); ?></div>
			<?php
				if ( function_exists( $shortcode_sanitize.'_shortcode_fields' ) ) {
					$shortcode_fields = call_user_func( $shortcode_sanitize.'_shortcode_fields', $preview_shortcode );
				}
				$shortcode_fields = apply_filters('wprpsp_shortcode_mapper_fields', $shortcode_fields, $preview_shortcode );

				$shortcode_mapper = new Wprpsp_Shortcode_Mapper();
				$shortcode_mapper->render( $shortcode_fields );
			?>
		</div>

		<div class="wprpsp-customizer-preview wprpsp-clearfix">
			<div class="wprpsp-customizer-shrt-wrp">
				<div class="wprpsp-customizer-heading"><?php _e('Shortcode', 'wp-responsive-recent-post-slider'); ?> 
					<div class="wprpsp-customizer-shrt-tool">
						<button type="button" class="button button-primary button-small wprpsp-cust-shrt-generate"><?php _e('Generate', 'wp-responsive-recent-post-slider') ?></button>
						<i title="<?php _e('Full Preview Mode', 'wp-responsive-recent-post-slider'); ?>" class="wprpsp-tooltip wprpsp-cust-dwp dashicons dashicons-editor-expand"></i>
					</div>
				</div>
				<form action="<?php echo esc_url($preview_url); ?>" method="post" class="wprpsp-customizer-shrt-form" id="wprpsp-customizer-shrt-form" target="wprpsp_customizer_preview_frame">
					<textarea name="wprpsp_customizer_shrt" class="wprpsp-customizer-shrt" id="wprpsp-customizer-shrt" placeholder="<?php _e('Copy or Paste Shortcode', 'wp-responsive-recent-post-slider'); ?>"></textarea>
				</form>
			</div>
			<div class="wprpsp-customizer-heading"><?php _e('Preview Window', 'wp-responsive-recent-post-slider'); ?> <span class="wprpsp-cust-heading-info wprpsp-tooltip" title="<?php _e('Preview will be displayed according to responsive layout mode. You can check with `Full Preview` mode for better visualization.', 'wp-responsive-recent-post-slider'); ?>">[?]</span></div>
			<div class="wprpsp-customizer-window">
				<iframe class="wprpsp-customizer-preview-frame" name="wprpsp_customizer_preview_frame" src="<?php echo esc_url($preview_url); ?>" scrolling="auto" frameborder="0"></iframe>
				<div class="wprpsp-customizer-loader"></div>
				<div class="wprpsp-customizer-error"><?php _e('Sorry, Something happened wrong.', 'wp-responsive-recent-post-slider'); ?></div>
			</div>
		</div>
	</div><!-- wprpsp-customizer -->

	<br/>
	<div class="wprpsp-cust-footer-note"><span class="description"><?php _e('Note: Preview will be displayed according to responsive layout mode. Live preview may display differently when added to your page based on inheritance from some styles.', 'wp-responsive-recent-post-slider'); ?></span></div>

</div><!-- end .wrap -->