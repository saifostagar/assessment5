<?php
/**
 * Pro Designs and Plugins Feed
 *
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.2.9
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Action to add menu
add_action('admin_menu', 'wprpsp_register_design_page', 12);

/**
 * Register plugin design page in admin menu
 * 
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.2.9
 */
function wprpsp_register_design_page() {
	add_submenu_page( 'wprpsp-settings', __('Getting Started - WP Responsive Recent Post Slider Pro', 'wp-responsive-recent-post-slider'), __('Getting Started', 'wp-responsive-recent-post-slider'), 'edit_posts', 'wprpsm-designs', 'wprpsp_designs_page' );
}

/**
 * Function to display plugin design HTML
 * 
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.2.9
 */
function wprpsp_designs_page() {

	$wpos_feed_tabs = wprpsp_help_tabs();
	$active_tab 	= isset($_GET['tab']) ? $_GET['tab'] : 'how-it-work';
?>

	<div class="wrap wprpsm-wrap">
		<h2 class="nav-tab-wrapper">
			<?php
			foreach ($wpos_feed_tabs as $tab_key => $tab_val) {
				$tab_name	= $tab_val['name'];
				$active_cls = ($tab_key == $active_tab) ? 'nav-tab-active' : '';
				$tab_link 	= add_query_arg( array('page' => 'wprpsm-designs', 'tab' => $tab_key), admin_url('admin.php') );
			?>

			<a class="nav-tab <?php echo $active_cls; ?>" href="<?php echo esc_url($tab_link); ?>"><?php echo $tab_name; ?></a>

			<?php } ?>
		</h2>

		<div class="wprpsm-tab-cnt-wrp">
		<?php
			if( isset($active_tab) && $active_tab == 'how-it-work' ) {
				wprpsp_howitwork_page();
			}
		?>
		</div><!-- end .wprpsm-tab-cnt-wrp -->

	</div><!-- end .wprpsm-wrap -->

<?php
}

/**
 * Gets the plugin design part feed
 *
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.2.9
 */
function wprpsp_get_plugin_design( $feed_type = '' ) {

	$active_tab = isset($_GET['tab']) ? $_GET['tab'] : '';

	// If tab is not set then return
	if( empty($active_tab) ) {
		return false;
	}

	// Taking some variables
	$wpos_feed_tabs = wprpsp_help_tabs();
	$transient_key 	= isset($wpos_feed_tabs[$active_tab]['transient_key']) 	? $wpos_feed_tabs[$active_tab]['transient_key'] 	: 'wprpsm_' . $active_tab;
	$url 			= isset($wpos_feed_tabs[$active_tab]['url']) 			? $wpos_feed_tabs[$active_tab]['url'] 				: '';
	$transient_time = isset($wpos_feed_tabs[$active_tab]['transient_time']) ? $wpos_feed_tabs[$active_tab]['transient_time'] 	: 172800;
	$cache 			= get_transient( $transient_key );

	if ( false === $cache ) {

		$feed 			= wp_remote_get( esc_url_raw( $url ), array( 'timeout' => 120, 'sslverify' => false ) );
		$response_code 	= wp_remote_retrieve_response_code( $feed );

		if ( ! is_wp_error( $feed ) && $response_code == 200 ) {
			if ( isset( $feed['body'] ) && strlen( $feed['body'] ) > 0 ) {
				$cache = wp_remote_retrieve_body( $feed );
				set_transient( $transient_key, $cache, $transient_time );
			}
		} else {
			$cache = '<div class="error"><p>' . __( 'There was an error retrieving the data from the server. Please try again later.', 'wp-responsive-recent-post-slider' ) . '</div>';
		}
	}
	return $cache;
}

/**
 * Function to get plugin feed tabs
 *
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.2.9
 */
function wprpsp_help_tabs() {
	$wpos_feed_tabs = array(
						'how-it-work' 	=> array(
													'name' => __('How It Works', 'wp-responsive-recent-post-slider'),
												),
					);
	return $wpos_feed_tabs;
}

/**
 * Function to get 'How It Works' HTML
 *
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.2.9
 */
function wprpsp_howitwork_page() { 
		$shrt_mapper = add_query_arg( array( 'page' => 'wprpsp-shrt-mapper' ), admin_url('admin.php') );
	?>

	<style type="text/css">
		.wpos-pro-box .hndle{background-color:#0073AA; color:#fff;}
		.wpos-pro-box.postbox{background:#dbf0fa none repeat scroll 0 0; border:1px solid #0073aa; color:#191e23;}
		.wprpsm-wrap .wpos-button-full{display:block; text-align:center; box-shadow:none; border-radius:0;}
		.wprpsm-shortcode-preview{background-color: #e7e7e7; font-weight: bold; padding: 2px 5px; display: inline-block; margin:0 0 2px 0;}
	</style>

	
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">

			<!--How it workd HTML -->
			<div id="post-body-content">
				<div class="meta-box-sortables">
					<div class="postbox">

						<h3 class="hndle">
							<span><?php _e( 'How It Works - Display And Shortcode', 'wp-responsive-recent-post-slider' ); ?></span>
						</h3>

						<div class="inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label><?php _e('Getting Started', 'wp-responsive-recent-post-slider'); ?></label>
										</th>
										<td>
											<ul>
												<li><?php _e('Step-1: This plugin create a tab "Recent Post Slider" in WordPress menu section.', 'wp-responsive-recent-post-slider'); ?></li>
												<li><?php _e('Step-2: This plugin works with WordPress post as well as custom post type. Kindly navigate to plugin settings and enable your relevant post type.', 'wp-responsive-recent-post-slider'); ?></li>
												<li><?php _e('Step-3: Go to "Posts --> Add new".', 'wp-responsive-recent-post-slider'); ?></li>
												<li><?php _e('Step-4: This plugin get all the latest POST from WordPress post section with a simple shortcode.', 'wp-responsive-recent-post-slider'); ?></li>
												<li></li>
											</ul>
											<p><?php _e('<strong>Note</strong> - If you need a <b>Featured Post</b> OR <b>Trending/Popular Post</b> plugin then try our plugins.', 'wp-responsive-recent-post-slider'); ?> <a href="https://wordpress.org/plugins/featured-post-creative/" target="_blank">Featured Post</a> and <a href="https://wordpress.org/plugins/wp-trending-post-slider-and-widget/" target="_blank">Trending/Popular Post</a></p>
										</td>
									</tr>

									<tr>
										<th>
											<label><?php _e('How Shortcode Works', 'wp-responsive-recent-post-slider'); ?></label>
										</th>
										<td>
											<ul>
												<li><?php _e('Step-1. Create a page like Latest Post OR add the shortcode in a page.', 'wp-responsive-recent-post-slider'); ?></li>
												<li><?php _e('Step-2. Put below shortcode as per your need.', 'wp-responsive-recent-post-slider'); ?></li>
											</ul>
										</td>
									</tr>

									<tr>
										<th>
											<label><?php _e('All Shortcodes', 'wp-responsive-recent-post-slider'); ?></label>
										</th>
										<td>
											<span class="wprpsm-shortcode-preview">[recent_post_slider]</span> – <?php _e('Post slider Shortcode.', 'wp-responsive-recent-post-slider'); ?><br/>
											<span class="wprpsm-shortcode-preview">[recent_post_carousel]</span> – <?php _e('Post Carousel Shortcode.', 'wp-responsive-recent-post-slider'); ?><br />
											<span class="wprpsm-shortcode-preview">[gridbox_post_slider]</span> – <?php _e('Post Gridbox slider Shortcode.', 'wp-responsive-recent-post-slider'); ?>
											<br/><br/>
											<div><a class="button button-primary wprpsp-shrt-map-btn" href="<?php echo esc_url( $shrt_mapper ); ?>"><?php _e('Try Our Shortcode Builder!!', 'wp-responsive-recent-post-slider'); ?></a></div>
										</td>
									</tr>
								</tbody>
							</table>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->
			</div><!-- #post-body-content -->

			<!--Upgrad to Pro HTML -->
			<div id="postbox-container-1" class="postbox-container">
				
				<div class="meta-box-sortables">
					<div class="postbox wpos-pro-box">

						<h3 class="hndle">
							<span><?php _e('Need Support?', 'wp-responsive-recent-post-slider'); ?></span>
						</h3>
						<div class="inside">
							<p><?php _e('Check plugin document for shortcode parameters and demo for designs.', 'wp-responsive-recent-post-slider'); ?></p>
							<a class="button button-primary wpos-button-full" href="<?php echo esc_url('http://docs.wponlinesupport.com/wp-responsive-recent-post-slider-pro/?utm_source=responsive_pro&utm_medium=hp&utm_campaign=getting_started'); ?>" target="_blank"><?php _e('Documentation', 'wp-responsive-recent-post-slider'); ?></a>
							<p><a class="button button-primary wpos-button-full" href="<?php echo esc_url('http://demo.wponlinesupport.com/prodemo/post-slider-pro/?utm_source=responsive_pro&utm_medium=hp&utm_campaign=getting_started'); ?>" target="_blank"><?php _e('Demo for Designs', 'wp-responsive-recent-post-slider'); ?></a></p>
						</div><!-- .inside -->
					</div><!-- .postbox -->

					<div class="postbox wpos-pro-box">
						<h3 class="hndle">
							<span><?php _e('Need PRO Support?', 'wp-responsive-recent-post-slider'); ?></span>
						</h3>
						<div class="inside">
							<p><?php _e('Hire our experts for any WordPress task.', 'wp-responsive-recent-post-slider'); ?></p>
							<p><a class="button button-primary wpos-button-full" href="<?php echo esc_url('https://www.wponlinesupport.com/wordpress-support/?utm_source=responsive_pro&utm_medium=hp&utm_campaign=getting_started'); ?>" target="_blank"><?php _e('Know More', 'wp-responsive-recent-post-slider'); ?></a></p>
						</div><!-- .inside -->
					</div><!-- .postbox -->

					<div class="postbox">
						<h3 class="hndle">
							<span><?php _e( 'Help to improve this plugin!', 'wp-responsive-recent-post-slider' ); ?></span>
						</h3>
						<div class="inside">
							<p><?php _e('Enjoyed this plugin? You can help by rate this plugin', 'wp-responsive-recent-post-slider'); ?> <a href="<?php echo esc_url('https://www.wponlinesupport.com/your-review/?utm_source=responsive_pro&utm_medium=hp&utm_campaign=getting_started'); ?>" target="_blank"><?php _e('5 stars!', 'wp-responsive-recent-post-slider'); ?></a></p>
						</div><!-- .inside -->
					</div><!-- .postbox -->

				</div><!-- .meta-box-sortables -->
			</div><!-- #post-container-1 -->

		</div><!-- #post-body -->
	</div><!-- #poststuff -->

<?php }