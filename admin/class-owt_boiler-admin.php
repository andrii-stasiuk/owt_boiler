<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.youtube.com
 * @since      1.0.0
 *
 * @package    Owt_boiler
 * @subpackage Owt_boiler/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Owt_boiler
 * @subpackage Owt_boiler/admin
 * @author     Andrii Stasiuk <olucky48@gmail.com>
 */
class Owt_boiler_Admin {

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
		 * defined in Owt_boiler_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Owt_boiler_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

//		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/owt_boiler-admin.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'bootstrap.min.css', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'jquery.dataTables.min.css', plugin_dir_url( __FILE__ ) . 'css/jquery.dataTables.min.css', array(), $this->version, 'all' );
		
		wp_enqueue_style( 'custom.css', plugin_dir_url( __FILE__ ) . 'css/custom.css', array(), $this->version, 'all' );

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
		 * defined in Owt_boiler_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Owt_boiler_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

//		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/owt_boiler-admin.js', array( 'jquery' ), $this->version, false );
		
		wp_enqueue_script( 'bootstrap.min.js', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'jquery.dataTables.min.js', plugin_dir_url( __FILE__ ) . 'js/jquery.dataTables.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'jquery.notifyBar.js', plugin_dir_url( __FILE__ ) . 'js/jquery.notifyBar.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'jquery.validate.min.js', plugin_dir_url( __FILE__ ) . 'js/jquery.validate.min.js', array( 'jquery' ), $this->version, false );
		
		wp_enqueue_script( 'custom.js', plugin_dir_url( __FILE__ ) . 'js/custom.js', array( 'jquery' ), $this->version, false );

	}

	//Show the links in admin menu when Activating the plugin
	public function owt_menus_sections() {
		global $wpdb;
		add_menu_page("OWT Menus", "OWT Menus", "manage_options", "owt-menus", array($this,'playlists'), 'dashicons-editor-help',7);
		add_submenu_page("owt-menus", "Playlists", "Playlists", "manage_options", "owt-menus", array($this,'playlists'));
		add_submenu_page("owt-menus", "Add playlist", "Add playlist", "manage_options", "owt-submenu2", array($this,'addplaylist'));
	}

	function playlists() {
		include_once OWT_BOILER_PLUGIN_DIR.'/admin/partials/owt-menu-playlist.php';
	}

	function addplaylist() {
		include_once OWT_BOILER_PLUGIN_DIR.'/admin/partials/owt-menu-add-playlist.php';
	}

}
