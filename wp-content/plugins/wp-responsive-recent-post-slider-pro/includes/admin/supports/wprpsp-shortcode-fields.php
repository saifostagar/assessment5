<?php
/**
 * Shortcode Fields for Shortcode Preview
 *
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Generate 'recent_post_slider' shortcode fields for preview
 * 
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.3.6
 */
function recent_post_slider_shortcode_fields( $shortcode ) {

	$fields = array(
			// General fields
			'general' => array(
					'title'		=> __('General Parameters', 'wp-responsive-recent-post-slider'),
					'params' 	=>  array(
									// General settings
									array(
										'type' 		=> 'dropdown',
										'heading' 	=> __( 'Design', 'wp-responsive-recent-post-slider' ),
										'name' 		=> 'design',
										'value' 	=> array(
															'design-1'   => __( 'Slider Design 1', 'wp-responsive-recent-post-slider' ),
															'design-2'   => __( 'Slider Design 2', 'wp-responsive-recent-post-slider' ),
															'design-3'   => __( 'Slider Design 3', 'wp-responsive-recent-post-slider' ),
															'design-4'   => __( 'Slider Design 4', 'wp-responsive-recent-post-slider' ),
															'design-5'   => __( 'Slider Design 5', 'wp-responsive-recent-post-slider' ),
															'design-6'   => __( 'Slider Design 6', 'wp-responsive-recent-post-slider' ),
															'design-7'   => __( 'Slider Design 7', 'wp-responsive-recent-post-slider' ),
															'design-8'   => __( 'Slider Design 8', 'wp-responsive-recent-post-slider' ),
															'design-9'   => __( 'Slider Design 9', 'wp-responsive-recent-post-slider' ),
															'design-10'  => __( 'Slider Design 10', 'wp-responsive-recent-post-slider' ),
															'design-11'  => __( 'Slider Design 11', 'wp-responsive-recent-post-slider' ),
															'design-12'  => __( 'Slider Design 12', 'wp-responsive-recent-post-slider' ),
															'design-13'  => __( 'Slider Design 13', 'wp-responsive-recent-post-slider' ),
															'design-14'  => __( 'Slider Design 14', 'wp-responsive-recent-post-slider' ),
															'design-15'  => __( 'Slider Design 15', 'wp-responsive-recent-post-slider' ),
															'design-16'  => __( 'Slider Design 16', 'wp-responsive-recent-post-slider' ),
															'design-17'  => __( 'Slider Design 17', 'wp-responsive-recent-post-slider' ),
															'design-18'  => __( 'Slider Design 18', 'wp-responsive-recent-post-slider' ),
															'design-19'  => __( 'Slider Design 19', 'wp-responsive-recent-post-slider' ),
															'design-20'  => __( 'Slider Design 20', 'wp-responsive-recent-post-slider' ),
															'design-21'  => __( 'Slider Design 21', 'wp-responsive-recent-post-slider' ),
															'design-22'  => __( 'Slider Design 22', 'wp-responsive-recent-post-slider' ),
															'design-23'  => __( 'Slider Design 23', 'wp-responsive-recent-post-slider' ),
															'design-24'  => __( 'Slider Design 24', 'wp-responsive-recent-post-slider' ),
															'design-25'  => __( 'Slider Design 25', 'wp-responsive-recent-post-slider' ),
														),
										'desc' 		=> __( 'Choose design.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type' 		=> 'dropdown',
										'heading' 	=> __( 'Post Date', 'wp-responsive-recent-post-slider' ),
										'name' 		=> 'show_date',
										'value' 	=> array(
															'true' 		=> __( 'True', 'wp-responsive-recent-post-slider' ),
															'false' 	=> __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'  	=> __( 'Display date.', 'wp-responsive-recent-post-slider' )
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Show Author', 'wp-responsive-recent-post-slider' ),
										'name'      => 'show_author',
										'value'     => array(
															'true' 		=> __( 'True', 'wp-responsive-recent-post-slider' ),
															'false' 	=> __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc' 		=> __( 'Display author.', 'wp-responsive-recent-post-slider' )
									),
									array(
										'type' 		=> 'dropdown',
										'heading' 	=> __( 'Show Category Name', 'wp-responsive-recent-post-slider' ),
										'name' 		=> 'show_category_name',
										'value' 	=> array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc' 		=> __( 'Display category.', 'wp-responsive-recent-post-slider' )
									),
									array(
										'type' 		=> 'dropdown',
										'heading' 	=> __( 'Show Content', 'wp-responsive-recent-post-slider' ),
										'name' 		=> 'show_content',
										'value' 	=> array(
															'true' 		=> __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  	=> __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc' 		=> __( 'Display content.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'number',
										'heading'   => __( 'Content Words Limit', 'wp-responsive-recent-post-slider' ),
										'name'      => 'content_words_limit',
										'value'     => 20,
										'desc'      => __( 'Display content words limit.', 'wp-responsive-recent-post-slider' ),
										'dependency'=> array(
															'element'   => 'show_content',
															'value'     => array( 'true' ),
														),
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Content Tail', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'content_tail',
										'value'     	=> '...',
										'refresh_time'	=> 1000,
										'desc'			=> __( 'Display dots after the post content as continue reading.', 'wp-responsive-recent-post-slider' ),
										'dependency'	=> array(
															'element'   => 'show_content',
															'value'     => array( 'true' ),
														),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Show Read More', 'wp-responsive-recent-post-slider' ),
										'name'      => 'show_read_more',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
													),
										'dependency'=> array(
															'element'   => 'show_content',
															'value'     => array( 'true' ),
														),
										'desc'      => __( 'Display read more.', 'wp-responsive-recent-post-slider' )
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Read More Button Text', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'read_more_text',
										'value'     	=> __('Read More', 'wp-responsive-recent-post-slider'),
										'desc'      	=> __( 'Enter read more text.', 'wp-responsive-recent-post-slider' ),
										'refresh_time'	=> 1000,
										'dependency'	=> array(
															'element'   => 'show_read_more',
															'value'     => array( 'true' ),
														),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Link Behaviour', 'wp-responsive-recent-post-slider' ),
										'name'      => 'link_target',
										'value'     => array(
															'self'   => __( 'Same Window', 'wp-responsive-recent-post-slider' ),
															'blank'  => __( 'New Window', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Choose link behaviour.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'text',
										'heading'   => __( 'Image Size', 'wp-responsive-recent-post-slider' ),
										'name'      => 'image_size',
										'value'     => 'full',
										'desc'      => __( 'Enter image size which is generated by WordPress. e.g thumbnail, medium, large, full', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'number',
										'heading'   => __( 'Slider Image Height', 'wp-responsive-recent-post-slider' ),
										'name'      => 'slider_height',
										'value'     => '',
										'desc'      => __( 'Control height of the featured image. You can enter any numeric number. e.g 500. Leave empty for default height.', 'wp-responsive-recent-post-slider' ),
										'dependency'=> array(
															'element'               => 'design',
															'value_not_equal_to'    => array( 'design-17', 'design-18', 'design-19', 'design-20' ),
														),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Image Fit', 'wp-responsive-recent-post-slider' ),
										'name'      => 'image_fit',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ) ,
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Fill the news image in a whole container.', 'wp-responsive-recent-post-slider' )
									),
									array(
										'type'     		=> 'text',
										'heading'  		=> __( 'Extra Class', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'extra_class',
										'value'     	=> '',
										'desc'      	=> __( 'Enter extra CSS class for design customization.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('Note: Extra class added as parent so using extra class you customize your design.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
										'refresh_time'	=> 1000,
									),
								),
			),
			
			// Slider Fields
			'slider' => array(
					'title'		=> __('Slider Parameters', 'wp-responsive-recent-post-slider'),
					'params'    => array(
									// Slider Settings
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Show Dots', 'wp-responsive-recent-post-slider' ),
										'name'      => 'dots',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Show dots indicators.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Show Arrows', 'wp-responsive-recent-post-slider' ),
										'name'      => 'arrows',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Show prev - next arrows.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Autoplay', 'wp-responsive-recent-post-slider' ),
										'name'      => 'autoplay',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Enable autoplay.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'number',
										'heading'   => __( 'Autoplay Interval', 'wp-responsive-recent-post-slider' ),
										'name'      => 'autoplay_interval',
										'value'     => 3000,
										'dependency'=> array(
															'element'   => 'autoplay',
															'value'     => array( 'true' ),
														),
										'desc'      => __( 'Enter autoplay speed.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'number',
										'heading'   => __( 'Speed', 'wp-responsive-recent-post-slider' ),
										'name'      => 'speed',
										'value'     => 600,
										'desc'      => __( 'Enter slide speed.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Fade Effect', 'wp-responsive-recent-post-slider' ),
										'name'      => 'fade',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'default'   => 'false',
										'desc'      => __( 'Enable fade effect.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Infinite', 'wp-responsive-recent-post-slider' ),
										'name'      => 'loop',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ) ,
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Enable infinite loop for continuous sliding.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type' 			=> 'dropdown',
										'heading' 		=> __( 'Pause On Hover', 'wp-responsive-recent-post-slider' ),
										'name' 			=> 'hover_pause',
										'value' 		=> array(
															'true'	=> __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'	=> __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'dependency' 	=> array(
																'element' 	=> 'autoplay',
																'value' 	=> array( 'true' ),
																),
										'desc' 			=> __( 'Pause slider autoplay on hover.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'		=> 'dropdown',
										'heading'	=> __( 'Pause On Focus', 'wp-responsive-recent-post-slider' ),
										'name'		=> 'focus_pause',
										'value'		=> array(
															'true'	=> __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'	=> __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'default'	=> 'false',
										'desc'		=> __( 'Pause slider autoplay when slider element is focused.', 'wp-responsive-recent-post-slider' ),
										'dependency'=> array(
															'element' 	=> 'autoplay',
															'value' 	=> array( 'true' ),
														),
									),
									array(
										'type'		=> 'number',
										'heading'	=> __( 'Nav Slides Column', 'wp-responsive-recent-post-slider' ),
										'name'		=> 'nav_slides',
										'value'		=> 4,
										'min'		=> 1,
										'desc'		=> __( 'Enter number of slider navigation column.', 'wp-responsive-recent-post-slider' ),
										'dependency'=> array(
															'element'   => 'design',
															'value'     => wprpsp_slider_nav_designs(),
														),
									),
									array(
										'type' 		=> 'dropdown',
										'heading' 	=> __( 'Slider Lazyload', 'wp-responsive-recent-post-slider' ),
										'name' 		=> 'lazyload',
										'value' 	=> array(
															'' 				=> __( 'Select Lazyload', 'wp-responsive-recent-post-slider' ),
															'ondemand' 		=> __( 'Ondemand', 'wp-responsive-recent-post-slider' ),
															'progressive' 	=> __( 'Progressive', 'wp-responsive-recent-post-slider' ),
													),
										'desc' 		=> __( 'Select option to use lazy loading in slider.', 'wp-responsive-recent-post-slider' ),
									),
								)
			),
			// Query Fields
			'query' => array(
					'title'     => __('Query Parameters', 'wp-responsive-recent-post-slider'),
					'params'    => array(
									// Query Settings
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Post Type', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'post_type',
										'value'     	=> 'post',
										'refresh_time'	=> 1000,
										'desc'      	=> __( 'Enter registered post type name. You can find it on plugin setting page.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('Note: Be sure you have added valid post type name otherwise no result will be displayed.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Taxonomy', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'taxonomy',
										'value'     	=> 'category',
										'refresh_time'	=> 1000,
										'desc'      	=> __( 'Enter registered taxonomy name. You can find it on plugin setting page.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('Note: Be sure you have added valid taxonomy name otherwise no result will be displayed.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type'      => 'number',
										'heading'   => __( 'Total items', 'wp-responsive-recent-post-slider' ),
										'name'      => 'limit',
										'value'     => 20,
										'min'       => -1,
										'desc'      => __( 'Enter number of post to be displayed. Enter -1 to display all.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Post Order By', 'wp-responsive-recent-post-slider' ),
										'name'      => 'orderby',
										'value'     => array(
															'date'      => __( 'Post Date', 'wp-responsive-recent-post-slider' ),
															'ID'        => __( 'Post ID', 'wp-responsive-recent-post-slider' ),
															'author'    => __( 'Post Author', 'wp-responsive-recent-post-slider' ),
															'title'     => __( 'Post Title', 'wp-responsive-recent-post-slider' ),
															'name'      => __( 'Post Slug', 'wp-responsive-recent-post-slider' ),
															'modified'  => __( 'Post Modified Date', 'wp-responsive-recent-post-slider' ),
															'rand'      => __( 'Random', 'wp-responsive-recent-post-slider' ),
															'menu_order'=> __( 'Menu Order', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Select order type.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Post Order', 'wp-responsive-recent-post-slider' ),
										'name'      => 'order',
										'value'     => array(
															'desc'   => __( 'Descending', 'wp-responsive-recent-post-slider' ),
															'asc'    => __( 'Ascending', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Select sorting order.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Display Specific Category', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'category',
										'value'     	=> '',
										'refresh_time'	=> 1000,
										'desc'      	=> __( 'Enter category id to display categories wise.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('You can pass multiple ids with comma seperated. You can find id at relevant category listing page.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Include Category Children', 'wp-responsive-recent-post-slider' ),
										'name'      => 'include_cat_child',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'If you are using parent category then whether to display child category or not.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Exclude Category', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'exclude_cat',
										'value'     	=> '',
										'refresh_time'	=> 1000,
										'desc'      	=> __( 'Exclude post category. Works only if `Category` field is empty.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('You can pass multiple ids with comma seperated. You can find id at relevant category listing page.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Display Specific Post', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'posts',
										'value'     	=> '',
										'refresh_time'	=> 1000,
										'desc'      	=> __('Enter id of the post which you want to display.', 'wp-responsive-recent-post-slider') . '<label title="'.__('You can pass multiple ids with comma seperated. You can find id at relevant post listing page.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Exclude Post', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'hide_post',
										'value'     	=> '',
										'refresh_time'	=> 1000,
										'desc'      	=> __('Enter id of the post which you do not want to display.', 'wp-responsive-recent-post-slider') . '<label title="'.__('You can pass multiple ids with comma seperated. You can find id at relevant post listing page.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type' 			=> 'text',
										'heading' 		=> __( 'Include author', 'wp-responsive-recent-post-slider' ),
										'name' 			=> 'include_author',
										'value' 		=> '',
										'refresh_time'	=> 1000,
										'desc' 			=> __( 'Enter author id to display posts of particular author.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('You can pass multiple ids with comma seperated. You can find id at users listing page.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type' 			=> 'text',
										'heading' 		=> __( 'Exclude author', 'wp-responsive-recent-post-slider' ),
										'name' 			=> 'exclude_author',
										'value' 		=> '',
										'refresh_time'	=> 1000,
										'desc' 			=> __( 'Enter author id to hide post of particular author. Works only if `Include Author` field is empty.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('You can pass multiple ids with comma seperated. You can find id at relevant users listing page.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Display Sticky Posts', 'wp-responsive-recent-post-slider' ),
										'name'      => 'sticky_posts',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'default'   => 'false',
										'desc'      => __( 'Display sticky posts or not. Note: sticky posts only be displayed at front side.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type' 		=> 'number',
										'heading' 	=> __( 'Query Offset', 'wp-responsive-recent-post-slider' ),
										'name' 		=> 'query_offset',
										'value' 	=> '',
										'desc' 		=> __( 'Exclude number of posts from starting.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('e.g if you pass 5 then it will skip first five post. Note: This will not work with limit=-1.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
								)
			),
	);
	return $fields;
}
/**
 * Generate 'recent_post_carousel' shortcode fields for preview
 * 
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.3.6
 */
function recent_post_carousel_shortcode_fields( $shortcode ) {

	$fields = array(
			// General fields
			'general' => array(
					'title'     => __('General Parameters', 'wp-responsive-recent-post-slider'),
					'params'    =>  array(
									// General settings
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Design', 'wp-responsive-recent-post-slider' ),
										'name'      => 'design',
										'value'     => array(
																'design-1'   => __( 'Carousel Design 1', 'wp-responsive-recent-post-slider' ),
																'design-2'   => __( 'Carousel Design 2', 'wp-responsive-recent-post-slider' ),
																'design-3'   => __( 'Carousel Design 3', 'wp-responsive-recent-post-slider' ),
																'design-4'   => __( 'Carousel Design 4', 'wp-responsive-recent-post-slider' ),
																'design-5'   => __( 'Carousel Design 5', 'wp-responsive-recent-post-slider' ),
																'design-6'   => __( 'Carousel Design 6', 'wp-responsive-recent-post-slider' ),
																'design-7'   => __( 'Carousel Design 7', 'wp-responsive-recent-post-slider' ),
																'design-8'   => __( 'Carousel Design 8', 'wp-responsive-recent-post-slider' ),
																'design-9'   => __( 'Carousel Design 9', 'wp-responsive-recent-post-slider' ),
																'design-10'  => __( 'Carousel Design 10', 'wp-responsive-recent-post-slider' ),
																'design-11'  => __( 'Carousel Design 11', 'wp-responsive-recent-post-slider' ),
																'design-12'  => __( 'Carousel Design 12', 'wp-responsive-recent-post-slider' ),
																'design-13'  => __( 'Carousel Design 13', 'wp-responsive-recent-post-slider' ),
																'design-14'  => __( 'Carousel Design 14', 'wp-responsive-recent-post-slider' ),
																'design-15'  => __( 'Carousel Design 15', 'wp-responsive-recent-post-slider' ),
																'design-16'  => __( 'Carousel Design 16', 'wp-responsive-recent-post-slider' ),
																'design-17'  => __( 'Carousel Design 17', 'wp-responsive-recent-post-slider' ),
																'design-18'  => __( 'Carousel Design 18', 'wp-responsive-recent-post-slider' ),
																'design-19'  => __( 'Carousel Design 19', 'wp-responsive-recent-post-slider' ),
																'design-20'  => __( 'Carousel Design 20', 'wp-responsive-recent-post-slider' ),
																'design-21'  => __( 'Carousel Design 21', 'wp-responsive-recent-post-slider' ),
																'design-22'  => __( 'Carousel Design 22', 'wp-responsive-recent-post-slider' ),
																'design-23'  => __( 'Carousel Design 23', 'wp-responsive-recent-post-slider' ),
																'design-24'  => __( 'Carousel Design 24', 'wp-responsive-recent-post-slider' ),
																'design-25'  => __( 'Carousel Design 25', 'wp-responsive-recent-post-slider' ),
																'design-26'  => __( 'Carousel Design 26', 'wp-responsive-recent-post-slider' ),
																'design-27'  => __( 'Carousel Design 27', 'wp-responsive-recent-post-slider' ),
																'design-28'  => __( 'Carousel Design 28', 'wp-responsive-recent-post-slider' ),
																'design-29'  => __( 'Carousel Design 29', 'wp-responsive-recent-post-slider' ),
																'design-30'  => __( 'Carousel Design 30', 'wp-responsive-recent-post-slider' ),
															),
										'desc'      => __( 'Choose design.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Post Date', 'wp-responsive-recent-post-slider' ),
										'name'      => 'show_date',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Display date.', 'wp-responsive-recent-post-slider' )
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Show Author', 'wp-responsive-recent-post-slider' ),
										'name'      => 'show_author',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Display author.', 'wp-responsive-recent-post-slider' )
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Show Category Name', 'wp-responsive-recent-post-slider' ),
										'name'      => 'show_category_name',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Display category.', 'wp-responsive-recent-post-slider' )
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Show Content', 'wp-responsive-recent-post-slider' ),
										'name'      => 'show_content',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Display content.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'number',
										'heading'   => __( 'Content Words Limit', 'wp-responsive-recent-post-slider' ),
										'name'      => 'content_words_limit',
										'value'     => 15,
										'desc'      => __( 'Display content words limit.', 'wp-responsive-recent-post-slider' ),
										'dependency'=> array(
															'element'   => 'show_content',
															'value'     => array( 'true' ),
														),
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Content Tail', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'content_tail',
										'value'     	=> '...',
										'refresh_time'	=> 1000,
										'desc'      	=> __( 'Display dots after the post content as continue reading.', 'wp-responsive-recent-post-slider' ),
										'dependency'	=> array(
																'element'   => 'show_content',
																'value'     => array( 'true' ),
															),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Show Read More', 'wp-responsive-recent-post-slider' ),
										'name'      => 'show_read_more',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'dependency'=> array(
															'element'   => 'show_content',
															'value'     => array( 'true' ),
														),
										'desc'      => __( 'Display read more.', 'wp-responsive-recent-post-slider' )
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Read More Button Text', 'wp-responsive-recent-post-slider' ),
										'name'     		=> 'read_more_text',
										'value'     	=> __('Read More', 'wp-responsive-recent-post-slider'),
										'desc'      	=> __( 'Enter read more text.', 'wp-responsive-recent-post-slider' ),
										'refresh_time'	=> 1000,
										'dependency'	=> array(
															'element'   => 'show_read_more',
															'value'     => array( 'true' ),
														),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Link Behaviour', 'wp-responsive-recent-post-slider' ),
										'name'      => 'link_target',
										'value'     => array(
															'self'   => __( 'Same Window', 'wp-responsive-recent-post-slider' ),
															'blank'  => __( 'New Window', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Choose link behaviour.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'text',
										'heading'   => __( 'Image Size', 'wp-responsive-recent-post-slider' ),
										'name'      => 'image_size',
										'value'     => 'full',
										'desc'      => __( 'Enter image size which is generated by WordPress. e.g thumbnail, medium, large, full', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'number',
										'heading'   => __( 'Image Height', 'wp-responsive-recent-post-slider' ),
										'name'      => 'image_height',
										'value'     => '',
										'desc'      => __( 'Control height of the featured image. You can enter any numeric number. e.g 500. Leave empty for default height.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Image Fit', 'wp-responsive-recent-post-slider' ),
										'name'      => 'image_fit',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ) ,
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Fill the news image in a whole container.', 'wp-responsive-recent-post-slider' )
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Extra Class', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'extra_class',
										'value'     	=> '',
										'desc'      	=> __( 'Enter extra CSS class for design customization.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('Note: Extra class added as parent so using extra class you customize your design.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
										'refresh_time'	=> 1000,
									),	
								)
			),
			
			//Slider Fields
			'slider' => array(
					'title'		=> __('Slider Parameters', 'wp-responsive-recent-post-slider'),
					'params'    => array(
									// Slider Settings
									array(
										'type'      => 'number',
										'heading'   => __( 'Slides Column', 'wp-responsive-recent-post-slider' ),
										'name'      => 'slides_to_show',
										'value'     => 2,
										'desc'      => __( 'Enter number for Slide to show at a time.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'number',
										'heading'   => __( 'Slides to Scroll', 'wp-responsive-recent-post-slider' ),
										'name'      => 'slides_to_scroll',
										'value'     => 1,
										'desc'      => __( 'Enter number of slides to scroll at a time.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Show Dots', 'wp-responsive-recent-post-slider' ),
										'name'      => 'dots',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Show dots indicators.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Show Arrows', 'wp-responsive-recent-post-slider' ),
										'name'      => 'arrows',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Show prev - next arrows.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Autoplay', 'wp-responsive-recent-post-slider' ),
										'name'      => 'autoplay',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Enable autoplay.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'number',
										'heading'   => __( 'Autoplay Interval', 'wp-responsive-recent-post-slider' ),
										'name'      => 'autoplay_interval',
										'value'     => 3000,
										'dependency'=> array(
															'element'   => 'autoplay',
															'value'     => array( 'true' ),
														),
										'desc'      => __( 'Enter autoplay speed.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'number',
										'heading'   => __( 'Speed', 'wp-responsive-recent-post-slider' ),
										'name'      => 'speed',
										'value'     => 300,
										'desc'      => __( 'Enter slide speed.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Infinite', 'wp-responsive-recent-post-slider' ),
										'name'      => 'loop',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ) ,
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Enable infinite loop for continuous sliding.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type' 		=> 'dropdown',
										'heading' 	=> __( 'Center Mode', 'wp-responsive-recent-post-slider' ),
										'name' 		=> 'centermode',
										'value' 	=> array(
															'true' 	=> __( 'True', 'wp-responsive-recent-post-slider' ),
															'false' => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'default'	=> 'false',
										'desc' 		=> __( 'Enable centered view with partial prev/next slides. Use with odd numbered `Slides to Scroll` and `Slider Column` counts.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type' 			=> 'dropdown',
										'heading' 		=> __( 'Pause On Hover', 'wp-responsive-recent-post-slider' ),
										'name' 			=> 'hover_pause',
										'value' 		=> array(
															'true'	=> __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'	=> __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'dependency' 	=> array(
																'element' 	=> 'autoplay',
																'value' 	=> array( 'true' ),
																),
										'desc' 			=> __( 'Pause slider autoplay on hover.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'		=> 'dropdown',
										'heading'	=> __( 'Pause On Focus', 'wp-responsive-recent-post-slider' ),
										'name'		=> 'focus_pause',
										'value'		=> array(
															'true'	=> __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'	=> __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'default'	=> 'false',
										'desc'		=> __( 'Pause slider autoplay when slider element is focused.', 'wp-responsive-recent-post-slider' ),
										'dependency'=> array(
															'element' 	=> 'autoplay',
															'value' 	=> array( 'true' ),
														),
									),
									array(
										'type' 		=> 'dropdown',
										'heading' 	=> __( 'Slider Lazyload', 'wp-responsive-recent-post-slider' ),
										'name' 		=> 'lazyload',
										'value' 	=> array(
															'' 				=> __( 'Select Lazyload', 'wp-responsive-recent-post-slider' ),
															'ondemand' 		=> __( 'Ondemand', 'wp-responsive-recent-post-slider' ),
															'progressive' 	=> __( 'Progressive', 'wp-responsive-recent-post-slider' ),
													),
										'desc' 		=> __( 'Select option to use lazy loading in slider.', 'wp-responsive-recent-post-slider' ),
									),
								)
			),
			// Query Fields
			'query' => array(
					'title'     => __('Query Parameters', 'wp-responsive-recent-post-slider'),
					'params'    => array(
									// Query Settings
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Post Type', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'post_type',
										'value'     	=> 'post',
										'refresh_time'	=> 1000,
										'desc'      	=> __( 'Enter registered post type name. You can find it on plugin setting page.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('Note: Be sure you have added valid post type name otherwise no result will be displayed.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Taxonomy', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'taxonomy',
										'value'     	=> 'category',
										'refresh_time'	=> 1000,
										'desc'      	=> __( 'Enter registered taxonomy name. You can find it on plugin setting page.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('Note: Be sure you have added valid taxonomy name otherwise no result will be displayed.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type'      => 'number',
										'heading'   => __( 'Total items', 'wp-responsive-recent-post-slider' ),
										'name'      => 'limit',
										'value'     => 20,
										'min'       => -1,
										'desc'      => __( 'Enter number of post to be displayed. Enter -1 to display all.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Post Order By', 'wp-responsive-recent-post-slider' ),
										'name'      => 'orderby',
										'value'     => array(
															'date'      => __( 'Post Date', 'wp-responsive-recent-post-slider' ),
															'ID'        => __( 'Post ID', 'wp-responsive-recent-post-slider' ),
															'author'    => __( 'Post Author', 'wp-responsive-recent-post-slider' ),
															'title'     => __( 'Post Title', 'wp-responsive-recent-post-slider' ),
															'name'      => __( 'Post Slug', 'wp-responsive-recent-post-slider' ),
															'modified'  => __( 'Post Modified Date', 'wp-responsive-recent-post-slider' ),
															'rand'      => __( 'Random', 'wp-responsive-recent-post-slider' ),
															'menu_order'=> __( 'Menu Order', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Select order type.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Post Order', 'wp-responsive-recent-post-slider' ),
										'name'      => 'order',
										'value'     => array(
															'desc'   => __( 'Descending', 'wp-responsive-recent-post-slider' ),
															'asc'    => __( 'Ascending', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Select sorting order.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Display Specific Category', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'category',
										'value'     	=> '',
										'refresh_time'	=> 1000,
										'desc'      	=> __( 'Enter category id to display categories wise.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('You can pass multiple ids with comma seperated. You can find id at relevant category listing page.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Include Category Children', 'wp-responsive-recent-post-slider' ),
										'name'      => 'include_cat_child',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'If you are using parent category then whether to display child category or not.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Exclude Category', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'exclude_cat',
										'value'     	=> '',
										'refresh_time'	=> 1000,
										'desc'      	=> __( 'Exclude post category. Works only if `Category` field is empty.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('You can pass multiple ids with comma seperated. You can find id at relevant category listing page.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Display Specific Post', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'posts',
										'value'     	=> '',
										'refresh_time'	=> 1000,
										'desc'      	=> __('Enter id of the post which you want to display.', 'wp-responsive-recent-post-slider') . '<label title="'.__('You can pass multiple ids with comma seperated. You can find id at relevant post listing page.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Exclude Post', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'hide_post',
										'value'     	=> '',
										'refresh_time'	=> 1000,
										'desc'      	=> __('Enter id of the post which you do not want to display.', 'wp-responsive-recent-post-slider') . '<label title="'.__('You can pass multiple ids with comma seperated. You can find id at relevant post listing page.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type' 			=> 'text',
										'heading' 		=> __( 'Include author', 'wp-responsive-recent-post-slider' ),
										'name' 			=> 'include_author',
										'value' 		=> '',
										'refresh_time'	=> 1000,
										'desc' 			=> __( 'Enter author id to display posts of particular author.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('You can pass multiple ids with comma seperated. You can find id at users listing page.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type' 			=> 'text',
										'heading' 		=> __( 'Exclude author', 'wp-responsive-recent-post-slider' ),
										'name' 			=> 'exclude_author',
										'value' 		=> '',
										'refresh_time'	=> 1000,
										'desc' 			=> __( 'Enter author id to hide post of particular author. Works only if `Include Author` field is empty.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('You can pass multiple ids with comma seperated. You can find id at relevant users listing page.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Display Sticky Posts', 'wp-responsive-recent-post-slider' ),
										'name'      => 'sticky_posts',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'default'   => 'false',
										'desc'      => __( 'Display sticky posts or not. Note: sticky posts only be displayed at front side.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type' 		=> 'number',
										'heading' 	=> __( 'Query Offset', 'wp-responsive-recent-post-slider' ),
										'name' 		=> 'query_offset',
										'value' 	=> '',
										'desc' 		=> __( 'Exclude number of posts from starting.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('e.g if you pass 5 then it will skip first five post. Note: This will not work with limit=-1.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
								)
			),
	);
	return $fields;
}
/**
 * Generate 'gridbox_post_slider' shortcode fields for preview
 * 
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.3.6
 */
function gridbox_post_slider_shortcode_fields( $shortcode ) {

	$fields = array(
			// General fields
			'general' => array(
					'title'     => __('General Parameters', 'wp-responsive-recent-post-slider'),
					'params'    =>  array(
									// General settings
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Design', 'wp-responsive-recent-post-slider' ),
										'name'      => 'design',
										'value'     => array(
															'design-1'   => __( 'Gridbox Design 1', 'wp-responsive-recent-post-slider' ),
															'design-2'   => __( 'Gridbox Design 2', 'wp-responsive-recent-post-slider' ),
															'design-3'   => __( 'Gridbox Design 3', 'wp-responsive-recent-post-slider' ),
															'design-4'   => __( 'Gridbox Design 4', 'wp-responsive-recent-post-slider' ),
															'design-5'   => __( 'Gridbox Design 5', 'wp-responsive-recent-post-slider' ),
															'design-6'   => __( 'Gridbox Design 6', 'wp-responsive-recent-post-slider' ),
															'design-7'   => __( 'Gridbox Design 7', 'wp-responsive-recent-post-slider' ),
															'design-8'   => __( 'Gridbox Design 8', 'wp-responsive-recent-post-slider' ), 
														),
										'desc'      => __( 'Choose design.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Post Date', 'wp-responsive-recent-post-slider' ),
										'name'      => 'show_date',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ) ,
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Display date.', 'wp-responsive-recent-post-slider' )
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Show Author', 'wp-responsive-recent-post-slider' ),
										'name'      => 'show_author',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Display author.', 'wp-responsive-recent-post-slider' )
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Show Category Name', 'wp-responsive-recent-post-slider' ),
										'name'      => 'show_category_name',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Display category.', 'wp-responsive-recent-post-slider' )
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Show Content', 'wp-responsive-recent-post-slider' ),
										'name'      => 'show_content',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'default'   => 'false',
										'desc'      => __( 'Display content.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'number',
										'heading'   => __( 'Content Words Limit', 'wp-responsive-recent-post-slider' ),
										'name'      => 'content_words_limit',
										'value'     => 20,
										'desc'      => __( 'Display content words limit.', 'wp-responsive-recent-post-slider' ),
										'dependency'=> array(
															'element'   => 'show_content',
															'value'     => array( 'true' ),
														),
									),
									array(
										'type'      => 'text',
										'heading'   => __( 'Content Tail', 'wp-responsive-recent-post-slider' ),
										'name'      => 'content_tail',
										'value'     => '...',
										'desc'      => __( 'Display dots after the post content as continue reading.', 'wp-responsive-recent-post-slider' ),
										'dependency'=> array(
															'element'   => 'show_content',
															'value'     => array( 'true' ),
														),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Link Behaviour', 'wp-responsive-recent-post-slider' ),
										'name'      => 'link_target',
										'value'     => array(
															'self'   => __( 'Same Window', 'wp-responsive-recent-post-slider' ),
															'blank'  => __( 'New Window', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Choose link behaviour.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'number',
										'heading'   => __( 'Image Height', 'wp-responsive-recent-post-slider' ),
										'name'      => 'image_height',
										'value'     => '',
										'desc'      => __( 'Control height of the featured image. You can enter any numeric number. e.g 500. Leave empty for default height.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Image Fit', 'wp-responsive-recent-post-slider' ),
										'name'      => 'image_fit',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Fill the news image in a whole container.', 'wp-responsive-recent-post-slider' )
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Extra Class', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'extra_class',
										'value'     	=> '',
										'desc'      	=> __( 'Enter extra CSS class for design customization.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('Note: Extra class added as parent so using extra class you customize your design.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
										'refresh_time'	=> 1000,
									),
								)
			),
			
			// slider Fields
			'slider' => array(
					'title'		=> __('Slider Parameters', 'wp-responsive-recent-post-slider'),
					'params'    => array(
									// Slider Settings  
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Show Dots', 'wp-responsive-recent-post-slider' ),
										'name'      => 'dots',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Show dots indicators.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Show Arrows', 'wp-responsive-recent-post-slider' ),
										'name'      => 'arrows',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Show prev - next arrows.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Autoplay', 'wp-responsive-recent-post-slider' ),
										'name'      => 'autoplay',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Enable autoplay.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'number',
										'heading'   => __( 'Autoplay Interval', 'wp-responsive-recent-post-slider' ),
										'name'      => 'autoplay_interval',
										'value'     => 3000,
										'dependency'=> array(
															'element'   => 'autoplay',
															'value'     => array( 'true' ),
														),
										'desc'      => __( 'Enter autoplay speed.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'number',
										'heading'   => __( 'Speed', 'wp-responsive-recent-post-slider' ),
										'name'      => 'speed',
										'value'     => 600,
										'desc'      => __( 'Enter slide speed.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Fade Effect', 'wp-responsive-recent-post-slider' ),
										'name'      => 'fade',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'default'   => 'false',
										'desc'      => __( 'Enable fade effect.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Infinite', 'wp-responsive-recent-post-slider' ),
										'name'      => 'loop',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Enable infinite loop for continuous sliding.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type' 			=> 'dropdown',
										'heading' 		=> __( 'Pause On Hover', 'wp-responsive-recent-post-slider' ),
										'name' 			=> 'hover_pause',
										'value' 		=> array(
															'true'	=> __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'	=> __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'dependency' 	=> array(
																'element' 	=> 'autoplay',
																'value' 	=> array( 'true' ),
																),
										'desc' 			=> __( 'Pause slider autoplay on hover.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'		=> 'dropdown',
										'heading'	=> __( 'Pause On Focus', 'wp-responsive-recent-post-slider' ),
										'name'		=> 'focus_pause',
										'value'		=> array(
															'true'	=> __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'	=> __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'default'	=> 'false',
										'desc'		=> __( 'Pause slider autoplay when slider element is focused.', 'wp-responsive-recent-post-slider' ),
										'dependency'=> array(
															'element' 	=> 'autoplay',
															'value' 	=> array( 'true' ),
														),
									),
									array(
										'type' 		=> 'dropdown',
										'heading' 	=> __( 'Slider Lazyload', 'wp-responsive-recent-post-slider' ),
										'name' 		=> 'lazyload',
										'value' 	=> array(
															'' 				=> __( 'Select Lazyload', 'wp-responsive-recent-post-slider' ),
															'ondemand' 		=> __( 'Ondemand', 'wp-responsive-recent-post-slider' ),
															'progressive' 	=> __( 'Progressive', 'wp-responsive-recent-post-slider' ),
													),
										'desc' 		=> __( 'Select option to use lazy loading in slider.', 'wp-responsive-recent-post-slider' ),
									),
								)
			),
			// Query Fields
			'query' => array(
					'title'     => __('Query Parameters', 'wp-responsive-recent-post-slider'),
					'params'    => array(
									// Query Settings
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Post Type', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'post_type',
										'value'     	=> 'post',
										'refresh_time'	=> 1000,
										'desc'      	=> __( 'Enter registered post type name. You can find it on plugin setting page.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('Note: Be sure you have added valid post type name otherwise no result will be displayed.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Taxonomy', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'taxonomy',
										'value'     	=> 'category',
										'refresh_time'	=> 1000,
										'desc'      	=> __( 'Enter registered taxonomy name. You can find it on plugin setting page.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('Note: Be sure you have added valid taxonomy name otherwise no result will be displayed.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type'      => 'number',
										'heading'   => __( 'Total items', 'wp-responsive-recent-post-slider' ),
										'name'      => 'limit',
										'value'     => 20,
										'min'       => -1,    
										'desc'      => __( 'Enter number of post to be displayed. Enter -1 to display all.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Post Order By', 'wp-responsive-recent-post-slider' ),
										'name'      => 'orderby',
										'value'     => array(
															'date'      => __( 'Post Date', 'wp-responsive-recent-post-slider' ),
															'ID'        => __( 'Post ID', 'wp-responsive-recent-post-slider' ),
															'author'    => __( 'Post Author', 'wp-responsive-recent-post-slider' ),
															'title'     => __( 'Post Title', 'wp-responsive-recent-post-slider' ),
															'name'      => __( 'Post Slug', 'wp-responsive-recent-post-slider' ),
															'modified'  => __( 'Post Modified Date', 'wp-responsive-recent-post-slider' ),
															'rand'      => __( 'Random', 'wp-responsive-recent-post-slider' ),
															'menu_order'=> __( 'Menu Order', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Select order type.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Post Order', 'wp-responsive-recent-post-slider' ),
										'name'      => 'order',
										'value'     => array(
															'desc'   => __( 'Descending', 'wp-responsive-recent-post-slider' ),
															'asc'    => __( 'Ascending', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'Select sorting order.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Display Specific Category', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'category',
										'value'     	=> '',
										'refresh_time'	=> 1000,
										'desc'     		=> __( 'Enter category id to display categories wise.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('You can pass multiple ids with comma seperated. You can find id at relevant category listing page.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Include Category Children', 'wp-responsive-recent-post-slider' ),
										'name'      => 'include_cat_child',
										'value'     => array(
															'true'  => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false' => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'desc'      => __( 'If you are using parent category then whether to display child category or not.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Exclude Category', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'exclude_cat',
										'value'     	=> '',
										'refresh_time'	=> 1000,
										'desc'			=> __( 'Exclude post category. Works only if `Category` field is empty.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('You can pass multiple ids with comma seperated. You can find id at relevant category listing page.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Display Specific Post', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'posts',
										'value'     	=> '',
										'refresh_time'	=> 1000,
										'desc'      	=> __('Enter id of the post which you want to display.', 'wp-responsive-recent-post-slider') . '<label title="'.__('You can pass multiple ids with comma seperated. You can find id at relevant post listing page.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type'      	=> 'text',
										'heading'   	=> __( 'Exclude Post', 'wp-responsive-recent-post-slider' ),
										'name'      	=> 'hide_post',
										'value'     	=> '',
										'refresh_time'	=> 1000,
										'desc'      	=> __('Enter id of the post which you do not want to display.', 'wp-responsive-recent-post-slider') . '<label title="'.__('You can pass multiple ids with comma seperated. You can find id at relevant post listing page.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type' 			=> 'text',
										'heading' 		=> __( 'Include author', 'wp-responsive-recent-post-slider' ),
										'name' 			=> 'include_author',
										'value' 		=> '',
										'refresh_time'	=> 1000,
										'desc' 			=> __( 'Enter author id to display posts of particular author.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('You can pass multiple ids with comma seperated. You can find id at users listing page.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type' 			=> 'text',
										'heading' 		=> __( 'Exclude author', 'wp-responsive-recent-post-slider' ),
										'name' 			=> 'exclude_author',
										'value' 		=> '',
										'refresh_time'	=> 1000,
										'desc' 			=> __( 'Enter author id to hide post of particular author. Works only if `Include Author` field is empty.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('You can pass multiple ids with comma seperated. You can find id at relevant users listing page.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
									array(
										'type'      => 'dropdown',
										'heading'   => __( 'Display Sticky Posts', 'wp-responsive-recent-post-slider' ),
										'name'      => 'sticky_posts',
										'value'     => array(
															'true'   => __( 'True', 'wp-responsive-recent-post-slider' ),
															'false'  => __( 'False', 'wp-responsive-recent-post-slider' ),
														),
										'default'   => 'false',
										'desc'      => __( 'Display sticky posts or not. Note: sticky posts only be displayed at front side.', 'wp-responsive-recent-post-slider' ),
									),
									array(
										'type' 		=> 'number',
										'heading' 	=> __( 'Query Offset', 'wp-responsive-recent-post-slider' ),
										'name' 		=> 'query_offset',
										'value' 	=> '',
										'desc' 		=> __( 'Exclude number of posts from starting.', 'wp-responsive-recent-post-slider' ) . '<label title="'.__('e.g if you pass 5 then it will skip first five post. Note: This will not work with limit=-1.', 'wp-responsive-recent-post-slider').'"> [?]</label>',
									),
								)
			),
	);
	return $fields;
}