<?php

add_action('init', 'display_jobs_posttype');
function display_jobs_posttype()
{

	// register custom post types
	register_post_type(
		'Jobs Management',
		array(
			'labels' => array(
				'name' => 'Jobs Management',
				'singular_name' => 'Jobs Management',
				'add_new' => 'Add New Job',
				'add_new_item' => 'Add New Jobs',
				'edit_item' => 'Edit Job',
				'new_item' => 'New Job',
				'all_items' => 'All Jobs',
				'view_item' => 'View Jobs',
				'search_items' => 'Search Job',
				'not_found' =>  'No Jobs Found',
				'not_found_in_trash' => 'No Jobs found in Trash',
				'parent_item_colon' => '',
				'item_published' => 'Jobs information has been Created',
				'item_updated' => 'Jobs information has been Updated',
				'menu_name' => 'Manage Jobs',
			),
			'public' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array('slug' => 'managejob'),
			'query_var' => true,
			'menu_icon' => 'dashicons-awards',
			'supports' => array(
				'title',
				'thumbnail',
				'editor',
				//   'custom-fields'
			)
		)
	);

	// Now register the taxonomy
	register_taxonomy('jobs-category', array('jobsmanagement'), array(
		'hierarchical' => true,
		'labels' => "Category",
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'jobs-category'),
	));
};





// register custom post type news 


add_action('init', 'display_news_posttype');
function display_news_posttype()
{

	// register custom post types
	register_post_type(
		'News Management',
		array(
			'labels' => array(
				'name' => 'News Management',
				'singular_name' => 'News Management',
				'add_new' => 'Add New News',
				'add_new_item' => 'Add New News',
				'edit_item' => 'Edit News',
				'new_item' => 'New News',
				'all_items' => 'All News',
				'view_item' => 'View News',
				'search_items' => 'Search News',
				'not_found' =>  'No News Found',
				'not_found_in_trash' => 'No News found in Trash',
				'parent_item_colon' => '',
				'item_published' => 'News information has been Created',
				'item_updated' => 'News information has been Updated',
				'menu_name' => 'Manage News',
			),
			'public' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array('slug' => 'managenews'),
			'query_var' => true,
			'menu_icon' => 'dashicons-analytics',
			'supports' => array(
				'title',
				'thumbnail',
				'editor',
				//   'custom-fields'
			)
		)
	);

	// Now register the taxonomy
	register_taxonomy('news-category', array('newsmanagement'), array(
		'hierarchical' => true,
		'labels' => "Category",
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'news-category')
	));
};







// register annousement custom post type



add_action('init', 'display_announce_posttype');
function display_announce_posttype()
{

	// register custom post types
	register_post_type(
		'announce Management',
		array(
			'labels' => array(
				'name' => 'announce Management',
				'singular_name' => 'announce Management',
				'add_new' => 'Add New announce',
				'add_new_item' => 'Add New announce',
				'edit_item' => 'Edit announce',
				'new_item' => 'New announce',
				'all_items' => 'All announce',
				'view_item' => 'View announce',
				'search_items' => 'Search announce',
				'not_found' =>  'No announce Found',
				'not_found_in_trash' => 'No announce found in Trash',
				'parent_item_colon' => '',
				'item_published' => 'announce information has been Created',
				'item_updated' => 'announce information has been Updated',
				'menu_name' => 'Manage announce',
			),
			'public' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array('slug' => 'manageannounce'),
			'query_var' => true,
			'menu_icon' => 'dashicons-megaphone',
			'supports' => array(
				'title',
				'thumbnail',
				'editor',
				//   'custom-fields'
			)
		)
	);

	// Now register the taxonomy
	register_taxonomy('announce-category', array('announcemanagement'), array(
		'hierarchical' => true,
		'labels' => "Category",
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'announce-category'),
	));
};







add_action('init', 'display_rfp_posttype');
function display_rfp_posttype()
{

	// register custom post types
	register_post_type(
		'RFP Management',
		array(
			'labels' => array(
				'name' => 'RFP Management',
				'singular_name' => 'RFP Management',
				'add_new' => 'Add New RFP',
				'add_new_item' => 'Add New RFP',
				'edit_item' => 'Edit RFP',
				'new_item' => 'New RFP',
				'all_items' => 'All RFP',
				'view_item' => 'View RFP',
				'search_items' => 'Search RFP',
				'not_found' =>  'No RFP Found',
				'not_found_in_trash' => 'No RFP found in Trash',
				'parent_item_colon' => '',
				'item_published' => 'RFP information has been Created',
				'item_updated' => 'RFP information has been Updated',
				'menu_name' => 'Manage RFP',
			),
			'public' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array('slug' => 'managerfp'),
			'query_var' => true,
			'menu_icon' => 'dashicons-buddicons-pm',
			'supports' => array(
				'title',
				'thumbnail',
				'editor',
				//   'custom-fields'
			)
		)
	);

	// Now register the taxonomy
	register_taxonomy('rfp-category', array('rfpmanagement'), array(
		'hierarchical' => true,
		'labels' => "Category",
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'rfp-category'),
	));
};













function display_jobs_posts()
{

	global $post;
	ob_start();
	$jobs_arg = array(
		'post_type'         => 'jobsmanagement', //supply the custom post type
		'posts_per_page'    => 3, //no# posts per page
		'order'             => 'DESC', //order the results 
		// meta query -- search with taxonomy
		// 'tax_query' => array(
		//     array(
		//         'taxonomy' => 'jobs-category',
		//         'field'    => 'slug',
		//         'terms' => 'hr-jobs	'
		//     )
		// )
	);


	$jobs_search_results = new WP_Query($jobs_arg);
	if ($jobs_search_results->have_posts()) :
		while ($jobs_search_results->have_posts()) : $jobs_search_results->the_post();
			$job_location = get_field('jobsmanagement_location');

?>
			<div class="job_item_wrapper">
				<div class="row">
					<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
						<div class="job_item_left">
							<h1 class="job_title"><?php the_title(); ?></h1>
							<h3 class="job_location"><?php echo $job_location; ?></h3>
						</div>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 right-job-section">
						<a href="<?php echo the_permalink(); ?>">
							<img src="<?php bloginfo('template_url') ?>/assets/img/ic-grey-arrow.png" alt="" />
						</a>
					</div>
				</div>
			</div>
		<?php
		endwhile;
	endif;
	return ob_get_clean();
};

add_shortcode('display_jobs_posts', 'display_jobs_posts');








function display_news_posts()
{

	ob_start();
	global $post;
	$news_arg = array(
		'post_type'         => 'newsmanagement', //supply the custom post type
		'posts_per_page'    => 10, //no# posts per page
		'order'             => 'DESC', //order the results 
		// meta query -- search with taxonomy
		// 'tax_query' => array(
		//     array(
		//         'taxonomy' => 'jobs-category',
		//         'field'    => 'slug',
		//         'terms' => 'hr-jobs	'
		//     )
		// )
	);


	$news_search_results = new WP_Query($news_arg);
	if ($news_search_results->have_posts()) :
		?>
		<div class="row">
			<?php
			while ($news_search_results->have_posts()) : $news_search_results->the_post();

			?>

				<div class col-4>

					<div class="news_img"><?php the_post_thumbnail(); ?> </div>
					<div class="card-body">
						<h3 class="news_title"><?php the_title(); ?></h3>
						<div class="news_content"><?php the_content(); ?></div>
					</div>
					<h5 class="news_date float-left"><?php the_date(); ?></h5>

				</div>


			<?php
			endwhile;
			?>
		</div>
		<?php
	endif;
	return ob_get_clean();
};

add_shortcode('display_news_posts', 'display_news_posts');







function display_announce_posts()
{

	ob_start();
	global $post;
	$announce_arg = array(
		'post_type'         => 'announcemanagement', //supply the custom post type
		'posts_per_page'    => 1, //no# posts per page
		'order'             => 'DESC', //order the results 
		// meta query -- search with taxonomy
		// 'tax_query' => array(
		//     array(
		//         'taxonomy' => 'jobs-category',
		//         'field'    => 'slug',
		//         'terms' => 'hr-jobs	'
		//     )
		// )
	);


	$announce_search_results = new WP_Query($announce_arg);
	if ($announce_search_results->have_posts()) :
		while ($announce_search_results->have_posts()) : $announce_search_results->the_post();
			$getlength = strlen(get_the_title());
			$thelength = 120;


		?>
			<div class="announce_item_wrapper">
				<div class="row">

					<div class="announce_item_left">
						<div class="announce_img"><?php the_post_thumbnail(); ?> </div>
						<h1 class="announce_title">
							<?php
							echo substr(get_the_title(), 0, $thelength);
							if ($getlength > $thelength) echo "...";
							?></h1>
						<h3 class="announce_date float-left"><?php the_date(); ?></h3>
					</div>

				</div>
			</div>
<?php
		endwhile;
	endif;
	return ob_get_clean();
};

add_shortcode('display_announce_posts', 'display_announce_posts');







class CSS_Menu_Walker extends Walker
{

	var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');

	function start_lvl(&$output, $depth = 0, $args = array())
	{
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul>\n";
	}

	function end_lvl(&$output, $depth = 0, $args = array())
	{
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
	{

		global $wp_query;
		$indent = ($depth) ? str_repeat("\t", $depth) : '';
		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;

		/* Add active class */
		if (in_array('current-menu-item', $classes)) {
			$classes[] = 'active';
			unset($classes['current-menu-item']);
		}

		/* Check for children */
		$children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
		if (!empty($children)) {
			$classes[] = 'has-sub';
		}

		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names . '>';

		$attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
		$attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
		$attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '><span>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</span></a>';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}

	function end_el(&$output, $item, $depth = 0, $args = array())
	{
		$output .= "</li>\n";
	}
}
