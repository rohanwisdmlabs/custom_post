<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://rohanray@gmail.com
 * @since      1.0.0
 *
 * @package    Custom_Post
 * @subpackage Custom_Post/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Custom_Post
 * @subpackage Custom_Post/public
 * @author     Rohan Ray <rohan.ray@wisdmlabs.com>
 */
class Custom_Post_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/custom-post-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/custom-post-public.js', array( 'jquery' ), $this->version, false );

	}

	function validation($content)
{
if(isset($_POST['submit']))
{
   $post_type=$_POST['Post_type'];
   $postCount=$_POST['Posts'];
   
   $args=array(
	'post_type' => $post_type,
	'posts_per_page' => $postCount,
	'orderby' => 'date',
	'order' => 'ASC',
   );

   $custom_post=new WP_Query($args);

   $new_content="<div class='table_style'>"
   ."<table class='table_data'>"
   ."<tr><th>Post ID</th>"
   ."<th>Post Title</th>"
   ."<th>Description</th>"
   ."<th>Slug</th>"
   ."<th>Link</th>"
   ."<th>Publish Date</th>"
   ."</tr>";

  
   foreach ( $custom_post->posts as $post ){
	$new_content.="<tr><td>".$post->ID."</td>"
	."<td>".$post->post_title."</td>"
	."<td>".wp_trim_words($post->post_content,20)."</td>"
	."<td>".$post->post_name."</td>"
	."<td>".get_permalink( $post->ID )."</td>"
	."<td>".$post->post_date."</td></tr>";

	}
	$new_content.="</div>";
	

$content.=$new_content;
return $content;
}
else{
	return $content;
}
}

		

}
