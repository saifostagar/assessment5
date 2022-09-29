<?php
/**
 * Widget API: Latest Post List Slider Widget 2 Class
 *
 * @package WP Responsive Recent Post Slider Pro
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function wprpsp_latest_post_list_slider2_widget() {
	register_widget( 'Wprpsp_Pro_Lplsw2_Widget' );
}

// Action to register widget
add_action( 'widgets_init', 'wprpsp_latest_post_list_slider2_widget' );

class Wprpsp_Pro_Lplsw2_Widget extends WP_Widget {

	var $defaults;

	/**
	 * Sets up a new widget instance.
	 * 
	 * @package WP Responsive Recent Post Slider Pro
	 * @since 1.0.0
	 */
	function __construct() {
		$widget_ops = array('classname' => 'wprpsp-lplsw2', 'description' => __('Displayed Latest Post Items in a List view OR Slider view', 'wp-responsive-recent-post-slider') );
		parent::__construct( 'wprpsp_lplsw2', __('Latest Post List/Slider 2', 'wp-responsive-recent-post-slider'), $widget_ops );

		$this->defaults = array(
			'post_type'				=> 'post',
			'taxonomy'				=> 'category',
			'category'				=> array(),
			'num_items'				=> 5,
			'title'					=> __( 'Latest Post List/Slider 2', 'wp-responsive-recent-post-slider' ),
			'date'					=> 1, 
			'show_category'			=> 1,
			'show_content'			=> 0,
			'link_target' 			=> 0,
			'active_slider'			=> 0,
			'dots'					=> "true",
			'autoplay'				=> "true",
			'autoplayInterval'		=> 5000,
			'speed'					=> 500,
			'hover_pause'			=> 'true',
			'focus_pause'			=> 'false',
			'content_words_limit'	=> 20,
			'content_tail'			=> '...',
			'sticky_posts'			=> 0,
			'include_author' 		=> array(),
			'exclude_author' 		=> array(),
			'query_offset'			=> '',
			'lazyload'				=> '',
		);
	}

	/**
	 * Handles updating settings for the current widget instance.
	 *
	 * @package WP Responsive Recent Post Slider Pro
	 * @since 1.0.0
	 */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['title']					= sanitize_text_field($new_instance['title']);
		$instance['num_items']				= wprpsp_pro_clean_number( $new_instance['num_items'], 5, 'number' );
		$instance['content_words_limit']	= wprpsp_pro_clean_number( $new_instance['content_words_limit'], 20 );
		$instance['autoplayInterval']		= wprpsp_pro_clean_number( $new_instance['autoplayInterval'], 5000 );
		$instance['speed']					= wprpsp_pro_clean_number( $new_instance['speed'], 500 );
		$instance['query_offset']			= wprpsp_pro_clean_number( $new_instance['query_offset'], '' );
		$instance['post_type']				= !empty($new_instance['post_type']) ? $new_instance['post_type'] : 'post';
		$instance['taxonomy']				= $new_instance['taxonomy'];
		$instance['category']				= $new_instance['category'];
		$instance['content_tail']			= $new_instance['content_tail'];
		$instance['include_author']			= $new_instance['include_author'];
		$instance['exclude_author']			= $new_instance['exclude_author'];
		$instance['dots']					= $new_instance['dots'];
		$instance['autoplay']				= $new_instance['autoplay'];
		$instance['hover_pause']			= $new_instance['hover_pause'];
		$instance['focus_pause']			= $new_instance['focus_pause'];
		$instance['date']					= !empty($new_instance['date'])             ? 1 		: 0;
		$instance['show_category']			= !empty($new_instance['show_category'])    ? 1 		: 0;
		$instance['show_content']			= !empty($new_instance['show_content'])     ? 1 		: 0;
		$instance['link_target'] 			= !empty($new_instance['link_target'])  	? 1 		: 0;
		$instance['active_slider']			= !empty($new_instance['active_slider'])    ? 1 		: 0;
		$instance['sticky_posts']			= !empty($new_instance['sticky_posts'])     ? 1 		: 0;
		$instance['lazyload'] 				= ( $new_instance['lazyload'] == 'ondemand' || $new_instance['lazyload'] == 'progressive' ) ? wprpsp_pro_clean( $new_instance['lazyload'] ) : '';

		return $instance;
	}

	/**
	 * Outputs the settings form for the widget.
	 *
	 * @package WP Responsive Recent Post Slider Pro
	 * @since 1.0.0
	 */
	function form($instance) {

		$instance 			= wp_parse_args( (array) $instance, $this->defaults );
		$category 			= (array) $instance['category'];
		$post_types 		= wprpsp_get_post_types();
		$support_post_types = wprpsp_get_option('post_types',array());
		$sel_post_type 		= (!empty($instance['post_type']) && in_array($instance['post_type'], $support_post_types)) ? $instance['post_type']    : 'post';
		$sel_taxonomy 		= (!empty($instance['post_type']) && in_array($instance['post_type'], $support_post_types)) ? $instance['taxonomy']     : 'category';
		$authors 			= get_users( array('fields' => array( 'ID', 'display_name', 'user_login' )) );
	?>

		<!-- Title  -->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'wp-responsive-recent-post-slider' ); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>

		<!-- Post type  -->
		<p>
			<label for="<?php echo $this->get_field_id('post_type'); ?>"><?php _e( 'Post Type', 'wp-responsive-recent-post-slider' ); ?>:</label>
			<select class="widefat wprpsp-reg-post-types" id="<?php echo $this->get_field_id('post_type'); ?>" name="<?php echo $this->get_field_name('post_type'); ?>" >
				<?php
				if( !empty($post_types) ) {
					foreach ($post_types as $post_key => $post_value) {
						if(in_array($post_key, $support_post_types)) {
							echo '<option value="'.$post_key.'" '.selected($post_key, $instance['post_type']).'>'.$post_value.'</option>';
						}
					}
				}
				?>
			</select>
		</p>

		<!-- Taxonomy  -->
		<p>
			<label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php _e( 'Texonomy', 'wp-responsive-recent-post-slider' ); ?>:</label>
			<select class="widefat wprpsp-reg-taxonomy" id="<?php echo $this->get_field_id('taxonomy'); ?>" name="<?php echo $this->get_field_name('taxonomy'); ?>">
				<?php 
				$taxonomy_objects   = get_object_taxonomies( $sel_post_type, 'object' );
				$taxonomy           = wprpsp_get_taxonomy_options($taxonomy_objects, $sel_taxonomy);
				echo $taxonomy;
				?>
			</select>
		</p>

		<!-- Category -->
		<p>
			<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e( 'Category', 'wp-responsive-recent-post-slider' ); ?>:</label>
			<select id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category[]'); ?>" class="widefat wprpsp-terms" multiple="multiple">
				<?php
				$taxonomy_objects   = get_terms(array('taxonomy' => $sel_taxonomy));
				$terms              = wprpsp_get_terms_options($taxonomy_objects, $instance['category']);
				echo $terms;
				?>
			</select>
		</p>

		<!-- Include Author -->
		<p>
			<label for="<?php echo $this->get_field_id('include_author'); ?>"><?php _e( 'Include Author', 'wp-responsive-recent-post-slider' ); ?>:</label>
			<select id="<?php echo $this->get_field_id('include_author'); ?>" name="<?php echo $this->get_field_name('include_author[]'); ?>" class="widefat wprpsp-author" multiple="multiple">
				<?php if( !empty($authors) ) {
					foreach ( $authors as $author ) {
							$selected = '';
							if ( in_array( $author->ID, $instance['include_author'] ) ) { $selected = "selected='selected'"; }
							echo '<option value="'.$author->ID.'" '.$selected.'>'.$author->display_name.' ('.$author->user_login.')</option>';
					}
				} ?>
			</select>
		</p>

		<!-- Exclude Author -->
		<p>
			<label for="<?php echo $this->get_field_id('exclude_author'); ?>"><?php _e( 'Exclude Author', 'wp-responsive-recent-post-slider' ); ?>:</label>
			<select id="<?php echo $this->get_field_id('exclude_author'); ?>" name="<?php echo $this->get_field_name('exclude_author[]'); ?>" class="widefat wprpsp-author" multiple="multiple">
				<?php
				if( !empty($authors) ) {
					foreach ($authors as $author) {
							$selected = '';
							if ( in_array( $author->ID, $instance['exclude_author'] ) ) { $selected = "selected='selected'"; }
							echo '<option value="'.$author->ID.'" '.$selected.'>'.$author->display_name.' ('.$author->user_login.')</option>';
					}
				}
				?>
			</select>
		</p>

		<!-- Number of Items:  -->
		<p>
			<label for="<?php echo $this->get_field_id('num_items'); ?>"><?php _e( 'Number of Items', 'wp-responsive-recent-post-slider' ); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('num_items'); ?>" name="<?php echo $this->get_field_name('num_items'); ?>" type="text" value="<?php echo $instance['num_items']; ?>" />
			<em><?php _e('Enter number of recent post to be displayed. Enter -1 to display all.', 'wp-responsive-recent-post-slider'); ?></em>
		</p>

		<!-- Display Date -->
		<p>
			<input id="<?php echo $this->get_field_id( 'date' ); ?>" name="<?php echo $this->get_field_name( 'date' ); ?>" type="checkbox" value="1" <?php checked( $instance['date'], 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'date' ); ?>"><?php _e( 'Display Date', 'wp-responsive-recent-post-slider' ); ?></label>
		</p>

		<!-- Display Category -->
		<p>
			<input id="<?php echo $this->get_field_id( 'show_category' ); ?>" name="<?php echo $this->get_field_name( 'show_category' ); ?>" type="checkbox" value="1" <?php checked( $instance['show_category'], 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'show_category' ); ?>"><?php _e( 'Display Category', 'wp-responsive-recent-post-slider' ); ?></label>
		</p>

		<!-- Open Link in a New Tab -->
		<p>
			<input type="checkbox" value="1" id="<?php echo $this->get_field_id( 'link_target' ); ?>" name="<?php echo $this->get_field_name( 'link_target' ); ?>" <?php checked($instance['link_target'], 1); ?> />
			<label for="<?php echo $this->get_field_id( 'link_target' ); ?>"><?php _e( 'Open Link in a New Tab', 'wp-responsive-recent-post-slider' ); ?></label>
		</p>

		<!-- Display Content -->
		<p>
			<input id="<?php echo $this->get_field_id( 'show_content' ); ?>" name="<?php echo $this->get_field_name( 'show_content' ); ?>" type="checkbox" value="1" <?php checked( $instance['show_content'], 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'show_content' ); ?>"><?php _e( 'Display Content', 'wp-responsive-recent-post-slider' ); ?></label>
		</p>

		<!-- Display Sticky Post -->
		<p>
			<input id="<?php echo $this->get_field_id( 'sticky_posts' ); ?>" name="<?php echo $this->get_field_name( 'sticky_posts' ); ?>" type="checkbox" value="1" <?php checked( $instance['sticky_posts'], 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'sticky_posts' ); ?>"><?php _e( 'Display Sticky Posts', 'wp-responsive-recent-post-slider' ); ?></label>
		</p>

		<!-- Content Words Limit -->
		<p>
			<label for="<?php echo $this->get_field_id('content_words_limit'); ?>"><?php _e( 'Content Words Limit', 'wp-responsive-recent-post-slider' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('content_words_limit'); ?>" name="<?php echo $this->get_field_name('content_words_limit'); ?>" type="text" value="<?php echo $instance['content_words_limit']; ?>" />
			<em><?php _e('Enter number of content words to be displayed.'); ?></em>
		</p>

		 <!-- Content Tail -->
		<p>
			<label for="<?php echo $this->get_field_id('content_tail'); ?>"><?php _e( 'Content Tail', 'wp-responsive-recent-post-slider' ); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('content_tail'); ?>" name="<?php echo $this->get_field_name('content_tail'); ?>" type="text" value="<?php echo esc_attr($instance['content_tail']); ?>" />
			<em><?php _e('Enter content tail.'); ?></em>
		</p>

		<!-- Query Offset -->
		<p>
			<label for="<?php echo $this->get_field_id('query_offset'); ?>"><?php esc_html_e( 'Query Offset', 'wp-responsive-recent-post-slider' ); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('query_offset'); ?>" name="<?php echo $this->get_field_name('query_offset'); ?>" type="text" value="<?php echo $instance['query_offset']; ?>" />
			<label><em><?php _e('Query `offset` parameter to exclude number of post. Leave empty for default.', 'wp-responsive-recent-post-slider'); ?></em><span title="<?php esc_html_e('Note: This parameter will not work when Number of Items is set to -1.','wp-responsive-recent-post-slider'); ?>"> [?]</span></label>
		</p>

		<!-- Active Slider -->
		<h3><?php _e( 'Post Slider Setting', 'wp-responsive-recent-post-slider' ); ?></h3>
		<hr/>
		<p>
			<input id="<?php echo $this->get_field_id( 'active_slider' ); ?>" name="<?php echo $this->get_field_name( 'active_slider' ); ?>" type="checkbox"<?php checked( $instance['active_slider'], 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'active_slider' ); ?>"><?php _e( 'Activate Slider', 'wp-responsive-recent-post-slider' ); ?></label><br/>
			<em><?php _e( 'Check this box to display post in slider View.', 'wp-responsive-recent-post-slider' ); ?></em>
		</p>

		<!-- Slider dots -->
		<p>
			<label for="<?php echo $this->get_field_id( 'dots' ); ?>"><?php _e( 'Dots', 'wp-responsive-recent-post-slider' ); ?>:</label>
			<select name="<?php echo $this->get_field_name( 'dots' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'dots' ); ?>">
				<option value="true" <?php selected( $instance['dots'], 'true' ); ?>><?php _e( 'True', 'wp-responsive-recent-post-slider' ); ?></option>
				<option value="false" <?php selected( $instance['dots'], 'false' ); ?>><?php _e( 'False', 'wp-responsive-recent-post-slider' ); ?></option>
			</select>
		</p>

		<!-- Slider Auto play -->
		<p>
			<label for="<?php echo $this->get_field_id( 'autoplay' ); ?>"><?php _e( 'Auto Play', 'wp-responsive-recent-post-slider' ); ?>:</label>
			<select name="<?php echo $this->get_field_name( 'autoplay' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'autoplay' ); ?>">
				<option value="true" <?php selected( $instance['autoplay'], 'true' ); ?>><?php _e( 'True', 'wp-responsive-recent-post-slider' ); ?></option>
				<option value="false" <?php selected( $instance['autoplay'], 'false' ); ?>><?php _e( 'False', 'wp-responsive-recent-post-slider' ); ?></option>
			</select>
		</p>

		<!-- Slider AutoplayInterval -->
		<p>
			<label for="<?php echo $this->get_field_id( 'autoplayInterval' ); ?>"><?php _e( 'Autoplay Interval', 'wp-responsive-recent-post-slider' ); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name( 'autoplayInterval' ); ?>"  value="<?php echo $instance['autoplayInterval']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'autoplayInterval' ); ?>" />
		</p>

		<!-- Slider Speed -->
		<p>
			<label for="<?php echo $this->get_field_id( 'speed' ); ?>"><?php _e( 'Speed', 'wp-responsive-recent-post-slider' ); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name( 'speed' ); ?>"  value="<?php echo $instance['speed']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'speed' ); ?>" />
		</p>

		<!-- Pause Of Hover -->
		<p>
			<label for="<?php echo $this->get_field_id( 'hover_pause' ); ?>"><?php _e( 'Pause On Hover', 'wp-responsive-recent-post-slider' ); ?>:</label>
			<select name="<?php echo $this->get_field_name( 'hover_pause' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'hover_pause' ); ?>">
				<option value="true" <?php selected( $instance['hover_pause'], 'true' ); ?>><?php _e( 'True', 'wp-responsive-recent-post-slider' ); ?></option>
				<option value="false" <?php selected( $instance['hover_pause'], 'false' ); ?>><?php _e( 'False', 'wp-responsive-recent-post-slider' ); ?></option>
			</select>
		</p>

		<!-- Pause Of Focus -->
		<p>
			<label for="<?php echo $this->get_field_id( 'focus_pause' ); ?>"><?php _e( 'Pause On Focus', 'wp-responsive-recent-post-slider' ); ?>:</label>
			<select name="<?php echo $this->get_field_name( 'focus_pause' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'focus_pause' ); ?>">
				<option value="true" <?php selected( $instance['focus_pause'], 'true' ); ?>><?php _e( 'True', 'wp-responsive-recent-post-slider' ); ?></option>
				<option value="false" <?php selected( $instance['focus_pause'], 'false' ); ?>><?php _e( 'False', 'wp-responsive-recent-post-slider' ); ?></option>
			</select>
		</p>

		<!-- Slider Lazyload -->
		<p>
			<label for="<?php echo $this->get_field_id( 'lazyload' ); ?>"><?php _e( 'Slider Lazyload', 'wp-responsive-recent-post-slider' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'lazyload' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'lazyload' ); ?>">
				<option value="" <?php selected( $instance['lazyload'], '' ); ?>><?php _e( 'Select Lazyload', 'wp-responsive-recent-post-slider' ); ?></option>
				<option value="ondemand" <?php selected( $instance['lazyload'], 'ondemand' ); ?>><?php _e( 'Ondemand', 'wp-responsive-recent-post-slider' ); ?></option>
				<option value="progressive" <?php selected( $instance['lazyload'], 'progressive' ); ?>><?php _e( 'Progressive', 'wp-responsive-recent-post-slider' ); ?></option>
			</select>
		</p>
<?php
	}

	/**
	* Outputs the content for the current widget instance.
	*
	* @package WP Responsive Recent Post Slider Pro
	* @since 1.0.0
	*/
	function widget($widget_args, $instance) {

		$atts = wp_parse_args( (array) $instance, $this->defaults );
		extract($widget_args, EXTR_SKIP);

		$support_post_types 			= wprpsp_get_option('post_types', array());
		$title 							= apply_filters( 'widget_title', $atts['title'], $atts, $this->id_base );
		$atts['post_type']				= (!empty($atts['post_type']) && in_array($atts['post_type'], $support_post_types)) ? $atts['post_type']    : 'post';
		$atts['taxonomy']				= (!empty($atts['post_type']) && in_array($atts['post_type'], $support_post_types)) ? $atts['taxonomy']     : 'category';
		$atts['category']				= (!empty($atts['post_type']) && in_array($atts['post_type'], $support_post_types)) ? $atts['category'] : array();
		$atts['link_target']			= (isset($atts['link_target']) && $atts['link_target'] == 1) 		? '_blank'				: '_self';
		$atts['sticky_posts']			= !empty($atts['sticky_posts']) ? 0 : 1;
		$atts['autoplay_interval']		= $atts['autoplayInterval'];

		// Extract Widegt Var
		extract($atts);

		// Slider configuration
		$atts['slider_conf'] = compact( 'dots', 'speed', 'autoplay_interval', 'autoplay', 'hover_pause', 'focus_pause', 'lazyload');

		// Taking some globals
		global $post;

		// Taking some variables
		$atts['widget_wrp_cls'] = 'wprpsp-post-widget wprpsp-post-static wprpsp-design-w3';
		$atts['unique']			= wprpsp_get_unique();

		// Enqueus required script
		if( $active_slider ) {
			$atts['widget_wrp_cls'] .= ' wprpsp-post-slider-widget'; // Slider class

			// Enqueus required script
			wp_enqueue_script( 'wpos-slick-jquery' );
			wp_enqueue_script( 'wprpsp-public-script' );
		}

		// WP Query Parameter
		$post_args = array(
						'posts_per_page'		=> $num_items,
						'post_type'				=> $post_type,
						'post_status'			=> array( 'publish' ),
						'order'					=> 'DESC',
						'author__in' 			=> $include_author,
						'author__not_in' 		=> $exclude_author,
						'ignore_sticky_posts' 	=> $sticky_posts,
						'offset'				=> $query_offset,
					);

		if( !empty($category) ) {
			$post_args['tax_query'] = array(
											array(
												'taxonomy'			=> $taxonomy,
												'field'				=> 'term_id',
												'terms'				=> $category,
											));
		}

		// WP Query
		$wprpsp_query = new WP_Query($post_args);

		// Start Widget Output
		echo $before_widget;

		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		// If post is there
		if ($wprpsp_query->have_posts()) :

			// Widget loop start
			wprpsp_get_template( 'widgets/post-list-slider-2/loop-start.php', $atts );

			while ($wprpsp_query->have_posts()) : $wprpsp_query->the_post();

				$atts['feat_image'] = wprpsp_get_post_featured_image( $post->ID, array(80,80), true );
				$atts['post_link']	= wprpsp_get_post_link( $post->ID );
				$atts['cat_list'] 	= wprpsp_get_category_list($post->ID, $taxonomy, $link_target);

				// Design Template
				wprpsp_get_template( 'widgets/post-list-slider-2/content.php', $atts );

			endwhile;

			// Widget loop end
			wprpsp_get_template( 'widgets/post-list-slider-2/loop-end.php', $atts );
		endif;

		wp_reset_postdata(); // Reset WP Query
		
		echo $after_widget;
	}
}