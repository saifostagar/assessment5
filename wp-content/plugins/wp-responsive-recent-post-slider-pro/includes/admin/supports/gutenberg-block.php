<?php
/**
 * Blocks Initializer
 * 
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function wprpsp_pro_register_guten_block() {

	// Some Variables
	$shrt_gen_link = add_query_arg( array( 'page' => 'wprpsp-shrt-mapper' ), admin_url('admin.php') );

	// Block Editor Script
	wp_register_script( 'wprpsp-block-js', WPRPSP_URL.'assets/js/blocks.build.js', array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components' ), WPRPSP_VERSION, true );
	wp_localize_script( 'wprpsp-block-js', 'Wprpsp_Block', array(
																	'shrt_gen_link' 			=> $shrt_gen_link,
																	'carousel_shrt_gen_link'	=> add_query_arg( array( 'shortcode' => 'recent_post_carousel' ), $shrt_gen_link ),
																	'variable_shrt_gen_link'	=> add_query_arg( array( 'shortcode' => 'gridbox_post_slider' ), $shrt_gen_link ),
																));

	// Register block and explicit attributes for grid
	register_block_type( 'wprpsp-pro/recent-post-slider', array(
		'attributes' => array(
			'design' => array(
							'type'		=> 'string',
							'default'	=> 'design-1',
						),
			'show_date' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_author' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_category_name' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_content' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'content_words_limit' => array(
							'type'		=> 'number',
							'default'	=> 20,
						),
			'content_tail' => array(
							'type'		=> 'string',
							'default'	=> '...',
						),
			'show_read_more' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'read_more_text' => array(
							'type'		=> 'string',
							'default'	=> 'Read More',
						),
			'link_target' => array(
							'type'		=> 'string',
							'default'	=> 'self',
						),
			'image_size' => array(
							'type'		=> 'string',
							'default'	=> 'full',
						),
			'slider_height' => array(
							'type'		=> 'number',
							'default'	=> '',
						),
			'image_fit' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'dots' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'arrows' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'autoplay' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'autoplay_interval' => array(
							'type'		=> 'number',
							'default'	=> 3000,
						),
			'speed' => array(
							'type'		=> 'number',
							'default'	=> 600,
						),
			'fade' => array(
							'type'		=> 'string',
							'default'	=> 'false',
						),
			'loop' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'hover_pause' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'focus_pause' => array(
							'type'		=> 'string',
							'default'	=> 'false',
						),
			'nav_slides' => array(
							'type'		=> 'number',
							'default'	=> 4,
						),
			'lazyload' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'post_type' => array(
							'type'		=> 'string',
							'default'	=> 'post',
						),
			'taxonomy' => array(
							'type'		=> 'string',
							'default'	=> 'category',
						),
			'limit' => array(
							'type'		=> 'number',
							'default'	=> 20,
						),
			'orderby' => array(
							'type'		=> 'string',
							'default'	=> 'date',
						),
			'order' => array(
							'type'		=> 'string',
							'default'	=> 'desc',
						),
			'category' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'include_cat_child' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'exclude_cat' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'posts' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'hide_post' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'include_author' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'exclude_author' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'sticky_posts' => array(
							'type'		=> 'string',
							'default'	=> 'false',
						),
			'query_offset' => array(
							'type'		=> 'number',
							'default'	=> '',
						),
			'align' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'className' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
		),
		'render_callback' => 'wprpsp_recent_post_slider',
	));

	//Register block, and explicitly define the attributes for slider
	register_block_type( 'wprpsp-pro/recent-post-carousel', array(
		'attributes' => array(
			'design' => array(
							'type'		=> 'string',
							'default'	=> 'design-1',
						),
			'show_date' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_author' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_category_name' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_content' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'content_words_limit' => array(
							'type'		=> 'number',
							'default'	=> 15,
						),
			'content_tail' => array(
							'type'		=> 'string',
							'default'	=> '...',
						),
			'show_read_more' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'read_more_text' => array(
							'type'		=> 'string',
							'default'	=> 'Read More',
						),
			'link_target' => array(
							'type'		=> 'string',
							'default'	=> 'self',
						),
			'image_size' => array(
							'type'		=> 'string',
							'default'	=> 'full',
						),
			'image_height' => array(
							'type'		=> 'number',
							'default'	=> '',
						),
			'image_fit' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'slides_to_show' => array(
							'type'		=> 'number',
							'default'	=> 2,
						),
			'slides_to_scroll' => array(
							'type'		=> 'number',
							'default'	=> 1,
						),
			'dots' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'arrows' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'autoplay' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'autoplay_interval' => array(
							'type'		=> 'number',
							'default'	=> 3000,
						),
			'speed' => array(
							'type'		=> 'number',
							'default'	=> 300,
						),
			'loop' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'centermode' => array(
						'type'		=> 'string',
						'default'	=> 'false',
						),
			'hover_pause' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'focus_pause' => array(
							'type'		=> 'string',
							'default'	=> 'false',
						),
			'lazyload' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'post_type' => array(
							'type'		=> 'string',
							'default'	=> 'post',
						),
			'taxonomy' => array(
							'type'		=> 'string',
							'default'	=> 'category',
						),
			'limit' => array(
							'type'		=> 'number',
							'default'	=> 20,
						),
			'orderby' => array(
							'type'		=> 'string',
							'default'	=> 'date',
						),
			'order' => array(
							'type'		=> 'string',
							'default'	=> 'desc',
						),
			'category' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'include_cat_child' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'exclude_cat' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'posts' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'hide_post' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'include_author' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'exclude_author' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'sticky_posts' => array(
							'type'		=> 'string',
							'default'	=> 'false',
						),
			'query_offset' => array(
							'type'		=> 'number',
							'default'	=> '',
						),	
			'align' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'className' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
		),
		'render_callback' => 'wprpsp_post_carousel',
	));

	//Register block, and explicitly define the attributes for slider
	register_block_type( 'wprpsp-pro/gridbox-post-slider', array(
		'attributes' => array(
			'design' => array(
							'type'		=> 'string',
							'default'	=> 'design-1',
						),
			'show_date' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_author' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_category_name' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_content' => array(
							'type'		=> 'boolean',
							'default'	=> false,
						),
			'content_words_limit' => array(
							'type'		=> 'number',
							'default'	=> 20,
						),
			'content_tail' => array(
							'type'		=> 'string',
							'default'	=> '...',
						),
			'link_target' => array(
							'type'		=> 'string',
							'default'	=> 'self',
						),
			'image_height' => array(
							'type'		=> 'number',
							'default'	=> '',
						),
			'image_fit' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'dots' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'arrows' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'autoplay' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'autoplay_interval' => array(
							'type'		=> 'number',
							'default'	=> 3000,
						),
			'speed' => array(
							'type'		=> 'number',
							'default'	=> 600,
						),
			'fade' => array(
							'type'		=> 'string',
							'default'	=> 'false',
						),
			'loop' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'hover_pause' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'focus_pause' => array(
							'type'		=> 'string',
							'default'	=> 'false',
						),
			'lazyload' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'post_type' => array(
							'type'		=> 'string',
							'default'	=> 'post',
						),
			'taxonomy' => array(
							'type'		=> 'string',
							'default'	=> 'category',
						),
			'limit' => array(
							'type'		=> 'number',
							'default'	=> 20,
						),
			'orderby' => array(
							'type'		=> 'string',
							'default'	=> 'date',
						),
			'order' => array(
							'type'		=> 'string',
							'default'	=> 'desc',
						),
			'category' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'include_cat_child' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'exclude_cat' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'posts' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'hide_post' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'include_author' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'exclude_author' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'sticky_posts' => array(
							'type'		=> 'string',
							'default'	=> 'false',
						),
			'query_offset' => array(
							'type'		=> 'number',
							'default'	=> '',
						),
			'align' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'className' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
		),
		'render_callback' => 'wprpsp_gridbox_post_slider',
	));

	if ( function_exists( 'wp_set_script_translations' ) ) {
		wp_set_script_translations( 'wprpsp-block-js', 'wp-responsive-recent-post-slider', WPRPSP_DIR . '/languages' );
	}

}
add_action( 'init', 'wprpsp_pro_register_guten_block' );

/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 *
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.4
 */
function wprpsp_pro_block_assets() {	
}
add_action( 'enqueue_block_assets', 'wprpsp_pro_block_assets' );

/**
 * Enqueue Gutenberg block assets for backend editor.
 *
 * @uses {wp-blocks} for block type registration & related functions.
 * @uses {wp-element} for WP Element abstraction — structure of blocks.
 * @uses {wp-i18n} to internationalize the block's text.
 * @uses {wp-editor} for WP editor styles.
 * 
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.4
 */
function wprpsp_pro_editor_assets() {

	// Block Editor CSS
	if( ! wp_style_is( 'wpos-guten-block-css', 'registered' ) ) {
		wp_register_style( 'wpos-guten-block-css', WPRPSP_URL.'assets/css/blocks.editor.build.css', array( 'wp-edit-blocks' ), WPRPSP_VERSION );
	}

	// Block Editor Script
	wp_enqueue_style( 'wpos-guten-block-css' );
	wp_enqueue_script( 'wprpsp-block-js' );

}
add_action( 'enqueue_block_editor_assets', 'wprpsp_pro_editor_assets' );

/**
 * Adds an extra category to the block inserter
 *
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.4
 */
function wprpsp_pro_add_block_category( $categories ) {

	$guten_cats = wp_list_pluck( $categories, 'slug' );

	if( ! in_array( 'wpos_guten_block', $guten_cats ) ) {
		$categories[] = array(
							'slug'	=> 'wpos_guten_block',
							'title'	=> __('WPOS Blocks', 'wp-responsive-recent-post-slider'),
							'icon'	=> null,
						);
	}

	return $categories;
}
add_filter( 'block_categories', 'wprpsp_pro_add_block_category' );