<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.youtube.com
 * @since      1.0.0
 *
 * @package    Owt_boiler
 * @subpackage Owt_boiler/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Owt_boiler
 * @subpackage Owt_boiler/includes
 * @author     Andrii Stasiuk <olucky48@gmail.com>
 */
class Owt_boiler_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate() {		
		global $wpdb;
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		$wpdb->show_errors();

$sqlQuery = <<<EOT
		CREATE TABLE `{$this->owtboilertable()}` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`name` varchar(255) DEFAULT NULL,
			`email` varchar(255) DEFAULT NULL,
			`phone_no` varchar(15) DEFAULT NULL,
			PRIMARY KEY (`id`)
		    ) ENGINE=InnoDB DEFAULT CHARSET=utf8
EOT;
		dbDelta($sqlQuery);
	}

	public function owtboilertable() {
		global $wpdb;
		return $wpdb->prefix."owt_boiler_table";
	}

}
