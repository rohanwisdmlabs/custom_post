<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://rohanray@gmail.com
 * @since             1.0.0
 * @package           Custom_Post
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Post Type
 * Plugin URI:        https://custom_post_type@gmail.com
 * Description:       This plugin contains 2 custom post types
 * Version:           1.0.0
 * Author:            Rohan Ray
 * Author URI:        https://rohanray@gmail.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       custom-post
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CUSTOM_POST_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-custom-post-activator.php
 */
function activate_custom_post() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-post-activator.php';
	Custom_Post_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-custom-post-deactivator.php
 */
function deactivate_custom_post() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-post-deactivator.php';
	Custom_Post_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_custom_post' );
register_deactivation_hook( __FILE__, 'deactivate_custom_post' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-custom-post.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

function create_custom_post_type()
{
	$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);
 // sessions label
$labels = array(
'name' => _x('Sessions', 'plural'),
'singular_name' => _x('Session', 'singular'),
'menu_name' => _x('Sessions', 'admin menu'),
'name_admin_bar' => _x('Sessions', 'admin bar'),
'add_new' => _x('Add Session', 'add new'),
'add_new_item' => __('Add New Session'),
'new_item' => __('New Session'),
'edit_item' => __('Edit Session'),
'view_item' => __('View Session'),
'all_items' => __('All Session'),
'search_items' => __('Search Session'),
'not_found' => __('No Session found.'),
);

//Courses label
$courselabels = array(
	'name' => _x('Coursesss', 'plural'),
	'singular_name' => _x('Coursess', 'singular'),
	'menu_name' => _x('Coursesss', 'admin menu'),
	'name_admin_bar' => _x('Coursesss', 'admin bar'),
	'add_new' => _x('Add Coursess', 'add new'),
	'add_new_item' => __('Add New Course'),
	'new_item' => __('New Course'),
	'edit_item' => __('Edit Coursess'),
	'view_item' => __('View Coursess'),
	'all_items' => __('All Coursess'),
	'search_items' => __('Search Coursess'),
	'not_found' => __('No Coursess found.'),
	);

	//Session args
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => 'Holds our Sessions and specific data',
'public' => true,
'taxonomies' => array( 'category', 'post_tag' ),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'session'),
'has_archive' => true,
'hierarchical' => false,
'menu_position' => 6,
'menu_icon' => 'dashicons-book',
);

//course args
 
$courseargs = array(
	'supports' => $supports,
	'labels' => $courselabels,
	'description' => 'Holds our Courses and specific data',
	'public' => true,
	'taxonomies' => array( 'category', 'post_tag' ),
	'show_ui' => true,
	'show_in_menu' => true,
	'show_in_nav_menus' => true,
	'show_in_admin_bar' => true,
	'can_export' => true,
	'capability_type' => 'post',
	 'show_in_rest' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'coursess'),
	'has_archive' => true,
	'hierarchical' => false,
	'menu_position' => 7,
	'menu_icon' => 'dashicons-book',
	);
 
register_post_type('session', $args);
register_post_type('coursess', $courseargs);
flush_rewrite_rules( false );
}
add_action('init', 'create_custom_post_type');













function run_custom_post() {

	$plugin = new Custom_Post();
	$plugin->run();

}
run_custom_post();
