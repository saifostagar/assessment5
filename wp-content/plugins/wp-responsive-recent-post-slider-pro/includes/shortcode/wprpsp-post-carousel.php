<?php
/**
 * 'recent_post_carousel' Shortcode
 * 
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function wprpsp_post_carousel( $atts, $content = null ){

	// Shortcode Parameter
	$atts = shortcode_atts(array(
		'post_type'				=> 'post',
		'taxonomy'				=> 'category',
		'limit' 				=> 20,
		'category' 				=> '',
		'include_cat_child'		=> 'true',
		'design' 				=> 'design-1',
		'show_date' 			=> 'true',
		'show_category_name' 	=> 'true',
		'show_content'			=> 'true',
		'content_words_limit' 	=> 15,
		'content_tail'			=> '...',
		'show_author' 			=> 'true',
		'dots' 					=> 'true',
		'arrows' 				=> 'true',
		'autoplay' 				=> 'true',
		'autoplay_interval' 	=> 3000,
		'speed'					=> 300,
		'link_target'			=> 'self',
		'show_read_more' 		=> 'true',
		'slides_to_show'		=> 2,
		'slides_to_scroll' 		=> 1,
		'centermode'			=> 'false',
		'loop'					=> 'true',
		'hover_pause'			=> 'true',
		'focus_pause'			=> 'false',
		'order'					=> 'DESC',
		'orderby'				=> 'date',
		'exclude_cat'			=> array(),
		'hide_post'				=> array(),
		'posts'					=> array(),
		'include_author' 		=> array(),
		'exclude_author'		=> array(),
		'read_more_text'		=> '',
		'sticky_posts' 			=> 'false',
		'image_size' 			=> 'full',
		'image_fit'				=> 'true',
		'image_height'			=> '',
		'rtl'					=> '',
		'query_offset'			=> '',
		'lazyload'				=> '',
		'className'				=> '',
		'align'					=> '',
		'extra_class'			=> '',
	), $atts, 'recent_post_carousel');

	$supported_post_types 			= wprpsp_get_option( 'post_types',array() );
	$shortcode_designs 				= wprpsp_recent_post_crousel_designs();
	$atts['content_tail']	 		= html_entity_decode( $atts['content_tail'] );
	$atts['limit']					= wprpsp_pro_clean_number( $atts['limit'], 20, 'number' );
	$atts['content_words_limit']	= wprpsp_pro_clean_number( $atts['content_words_limit'], 15 );
	$atts['autoplay_interval']		= wprpsp_pro_clean_number( $atts['autoplay_interval'], 3000 );
	$atts['speed']					= wprpsp_pro_clean_number( $atts['speed'], 300 );
	$atts['slides_to_show']			= wprpsp_pro_clean_number( $atts['slides_to_show'], 2 );
	$atts['slides_to_scroll']		= wprpsp_pro_clean_number( $atts['slides_to_scroll'], 1 );
	$atts['image_height']			= wprpsp_pro_clean_number( $atts['image_height'], '' );
	$atts['query_offset']			= wprpsp_pro_clean_number( $atts['query_offset'], '' );
	$atts['post_type'] 				= ( !empty( $atts['post_type'] ) && in_array( $atts['post_type'], $supported_post_types ) )	? $atts['post_type'] : 'post';
	$atts['taxonomy'] 				= ( !empty( $atts['taxonomy'] ) )				? $atts['taxonomy']							: 'category';
	$atts['category'] 				= ( !empty( $atts['category'] ) )				? explode( ',',$atts['category'] ) 			: '';
	$atts['include_cat_child']		= ( $atts['include_cat_child'] == 'false' ) 	? false 									: true;
	$atts['design'] 				= ( $atts['design'] && ( array_key_exists( trim( $atts['design'] ), $shortcode_designs ) ) ) ? trim( $atts['design'] ) : 'design-1';
	$atts['show_date'] 				= ( $atts['show_date'] == 'true' ) 				? 1				 							: 0;
	$atts['show_category_name'] 	= ( $atts['show_category_name'] == 'true' )		? 1 				 						: 0;
	$atts['show_content'] 			= ( $atts['show_content'] == 'true' ) 			? 1 				 						: 0;
	$atts['show_author'] 			= ( $atts['show_author'] == 'true')				? 1				 							: 0;
	$atts['dots'] 					= ( $atts['dots'] == 'false' ) 					? 'false' 				 					: 'true';
	$atts['arrows'] 				= ( $atts['arrows'] == 'false' ) 				? 'false' 				 					: 'true';
	$atts['autoplay'] 				= ( $atts['autoplay'] == 'false' ) 				? 'false' 				 					: 'true';
	$atts['link_target'] 			= ( $atts['link_target'] == 'blank') 			? '_blank' 				 					: '_self';
	$atts['show_read_more'] 		= ( $atts['show_read_more'] == 'false' )		? 0 				 						: 1;
	$atts['infinite'] 				= ( $atts['loop'] == 'true' ) 					? 'true' 				 					: 'false';
	$atts['hover_pause'] 			= ( $atts['hover_pause'] == 'false' ) 			? 'false' 									: 'true';
	$atts['focus_pause'] 			= ( $atts['focus_pause'] == 'true' ) 			? 'true' 									: 'false';
	$atts['order']					= (strtolower( $atts['order'] ) == 'asc' ) 		? 'ASC' 				 					: 'DESC';
	$atts['orderby']				= !empty( $atts['orderby'] ) 					? $atts['orderby'] 				 			: 'date';
	$atts['exclude_cat']			= !empty( $atts['exclude_cat'] )				? explode( ',', $atts['exclude_cat'] ) 		: array();
	$atts['exclude_post']			= !empty( $atts['hide_post'] )					? explode( ',', $atts['hide_post'] ) 		: array();
	$atts['posts']					= !empty( $atts['posts'] )						? explode( ',', $atts['posts'] ) 			: array();
	$atts['include_author']			= !empty( $atts['include_author'] )				? explode( ',', $atts['include_author'] ) 	: array();
	$atts['exclude_author']			= !empty( $atts['exclude_author'] )				? explode( ',', $atts['exclude_author'] )	: array();
	$atts['read_more_text'] 		= !empty( $atts['read_more_text'] ) 			? $atts['read_more_text'] 					: __('Read More', 'wp-responsive-recent-post-slider');
	$atts['sticky_posts'] 			= ( $atts['sticky_posts'] == 'true' ) 			? false 									: true;
	$atts['image_size'] 			= !empty($atts['image_size']) 					? $atts['image_size'] 			 			: 'full';
	$atts['image_fit']				= ($atts['image_fit'] == 'false')				? 0 										: 1;
	$atts['height_css'] 			= ($atts['image_height']) 						? 'height:'.$atts['image_height'].'px;' 	: '';
	$atts['lazyload'] 				= ( $atts['lazyload'] == 'ondemand' || $atts['lazyload'] == 'progressive' ) ? $atts['lazyload'] : ''; // ondemand or progressive
	$atts['align']					= !empty( $atts['align'] )						? 'align'.$atts['align']					: '';
	$atts['extra_class']			= $atts['extra_class'] .' '. $atts['align'] .' '. $atts['className'];
	$atts['extra_class']			= wprpsp_pro_sanitize_html_classes( $atts['extra_class'] );

	// Extract Shortcode Var
	extract($atts);

	// For RTL
	if( empty( $rtl ) && is_rtl() ) {
		$rtl = 'true';
	} elseif ( $rtl == 'true' ) {
		$rtl = 'true';
	} else {
		$rtl = 'false';
	}

	// Enqueus required script
	wp_enqueue_script( 'wpos-slick-jquery' );
	wp_enqueue_script( 'wprpsp-public-script' );

	// Taking some global
	global $post;

	// Taking some variables
	$atts['count'] 	= 0;
	$atts['unique']	= wprpsp_get_unique();
	$old_browser	= wprpsp_old_browser();

	// Slider class
	$atts['slider_cls'] = "wprpsp-{$design}";
	$atts['slider_cls']	.= ( $image_fit ) 	? ' wprpsp-image-fit' 	: '';
	$atts['slider_cls']	.= ( $old_browser && $image_fit ) 	? ' wprpsp-old-browser' : '';

	// WP Query Parameters
	$args = array ( 
		'post_type'				=> $post_type,
		'orderby'				=> $orderby,
		'order'					=> $order,
		'posts_per_page' 		=> $limit,
		'post__not_in'			=> $exclude_post,
		'post__in'				=> $posts,
		'author__in' 			=> $include_author,
		'author__not_in' 		=> $exclude_author,
		'ignore_sticky_posts'	=> $sticky_posts,
		'offset'				=> $query_offset,
	);

	// Category Parameter
	if($category != "") {
		$args['tax_query'] = array(
								array( 
									'taxonomy' 			=> $taxonomy,
									'field' 			=> 'term_id',
									'terms' 			=> $category,
									'include_children'	=> $include_cat_child,
							));

	} else if( !empty($exclude_cat) ) {
		$args['tax_query'] = array(
								array(
									'taxonomy' 			=> $taxonomy,
									'field' 			=> 'term_id',
									'terms' 			=> $exclude_cat,
									'operator'			=> 'NOT IN',
									'include_children'	=> $include_cat_child,
								));
	}

	// WP Query
	$query = new WP_Query($args);
	$post_count = $query->post_count;

	// Slider configuration and taken care of centermode
	$slides_to_show 	= (!empty($slides_to_show) && $slides_to_show <= $post_count) ? $slides_to_show : $post_count;
	$centermode			= ($centermode == 'true' && $slides_to_show % 2 != 0 && $slides_to_show != $post_count) ? 'true' : 'false';
	$atts['slider_cls']	.= " slides-to-show-{$slides_to_show}";
	$atts['slider_cls']	.= ( $centermode == "true" ) ? ' wprpsp-center-mode' : '';

	// Slider configuration
	$atts['slider_conf'] 	= compact('dots', 'arrows', 'autoplay', 'autoplay_interval', 'speed', 'slides_to_show','slides_to_scroll', 'centermode', 'infinite', 'hover_pause', 'focus_pause', 'rtl', 'lazyload');

	ob_start();

	if ( $query->have_posts() ) :

		wprpsp_get_template( 'carousel/loop-start.php', $atts ); // loop start

		while ( $query->have_posts() ) : $query->the_post();

			$atts['post_link'] 			= wprpsp_get_post_link( $post->ID );
			$atts['cat_list']			= wprpsp_get_category_list($post->ID, $taxonomy, $link_target);
			$atts['feat_image'] 		= wprpsp_get_post_featured_image( $post->ID, $image_size, true );
			$atts['recent_post_title']	= get_the_title();

			// Designs Template
			wprpsp_get_template( "carousel/{$design}.php", $atts );

			$atts['count']++;

		endwhile;

		wprpsp_get_template( 'carousel/loop-end.php', $atts ); // loop end

	endif; // End of have_post()

	wp_reset_postdata(); // Reset WP Query

	$content .= ob_get_clean();
	return $content;
}

// 'recent_post_carousel' Shortcode
add_shortcode( 'recent_post_carousel', 'wprpsp_post_carousel' );