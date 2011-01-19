<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */

/**
 * Make theme available for translation
 * Translations can be filed in the /languages/ directory
 * If you're building a theme based on toolbox, use a find and replace
 * to change 'toolbox' to the name of your theme in all the template files
 */
load_theme_textdomain( 'toolbox', TEMPLATEPATH . '/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/**
 * This theme uses wp_nav_menu() in one location.
 */
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'toolbox' ),
) );

/**
 * Add default posts and comments RSS feed links to head
 */
add_theme_support( 'automatic-feed-links' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function toolbox_page_menu_args($args) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'toolbox_page_menu_args' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function toolbox_widgets_init() {
	register_sidebar( array (
		'name' => __( 'Sidebar 1', 'toolbox' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array (
		'name' => __( 'Sidebar 2', 'toolbox' ),
		'id' => 'sidebar-2',
		'description' => __( 'An optional second sidebar area', 'toolbox' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );	
}
add_action( 'init', 'toolbox_widgets_init' );


/* Enable featured image functionality */
add_theme_support( 'post-thumbnails', array( 'post' ) ); // Add it for posts
set_post_thumbnail_size( 942, 420, true ); // 942 pixels wide by 420 pixels tall, hard crop mode

function wpe_excerptlength_teaser($length) {
	return 55;
}
function wpe_excerptlength_index($length) {
	return 125;
}
function wpe_excerptmore($more) {
	return ' [...] <a class="readmore" href="'.get_permalink().'">Read More</a>';
}

function wpe_excerpt($length_callback='', $more_callback='') {
	global $post;
	if (function_exists($length_callback)){
		add_filter('excerpt_length', $length_callback);
	}
	
	if (function_exists($more_callback)){
		add_filter('excerpt_more', $more_callback);
	}
	
	$output = get_the_excerpt();
	$output = apply_filters('wptexturize', $output);
	$output = apply_filters('convert_chars', $output);
	$output = '<p>'.$output.'</p>';
	echo $output;
}

/* Make results on certain pages longer, ignoring GUI settings*/
function change_wp_search_size($query) {
	if ( $query->is_search || $query->is_archive ) // Make sure it is a search or an archive page
		$query->query_vars['posts_per_page'] = 10; // Change 10 to the number of posts you would like to show
 
	return $query; // Return our modified query variables
}
add_filter('pre_get_posts', 'change_wp_search_size'); // Hook our custom function onto the request filter