<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://rohanray@gmail.com
 * @since      1.0.0
 *
 * @package    Custom_Post
 * @subpackage Custom_Post/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Custom_Post
 * @subpackage Custom_Post/admin
 * @author     Rohan Ray <rohan.ray@wisdmlabs.com>
 */
class Custom_Post_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Custom_Post_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Custom_Post_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/custom-post-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Custom_Post_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Custom_Post_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/custom-post-admin.js', array( 'jquery' ), $this->version, false );

	}

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

}
