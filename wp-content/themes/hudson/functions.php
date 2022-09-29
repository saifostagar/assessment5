<?php
//inlcide the dependency functions.
require get_template_directory() . '/inc/functions-admin.php';
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

// Add default posts and comments RSS feed links to head.
add_theme_support('automatic-feed-links');

/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
add_theme_support('title-tag');

/*
* Enable support for Post Thumbnails on posts and pages.
*
* @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
*/

set_post_thumbnail_size(1200, 9999);


/*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
add_theme_support(
	'html5',
	array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	)
);

/*
				* Enable support for Post Formats.
				*
				* See: https://codex.wordpress.org/Post_Formats
				*/
add_theme_support(
	'post-formats',
	array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	)
);

// Load regular editor styles into the new block-based editor.
add_theme_support('editor-styles');

// Load default block styles.
add_theme_support('wp-block-styles');

// Add support for responsive embeds.
add_theme_support('responsive-embeds');

// Add support for thumbnails
add_theme_support('post-thumbnails');


function nav_menus()
{
	register_nav_menus(
		array(
			'primary' => 'Header Menu',
			'footer-menu-1' => "Quick Links",
			"footer-menu-2" => "Resources"
		),


	);
}

add_action('init', 'nav_menus');

