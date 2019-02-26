<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://www.youtube.com
 * @since      1.0.0
 *
 * @package    Owt_boiler
 * @subpackage Owt_boiler/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Owt_boiler
 * @subpackage Owt_boiler/includes
 * @author     Andrii Stasiuk <olucky48@gmail.com>
 */
class Owt_boiler_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function deactivate() {
		global $wpdb;
		$wpdb->query("drop table if exists ".$this->owtboilertable());
	}

	public function owtboilertable() {
		global $wpdb;
		return $wpdb->prefix."owt_boiler_table";
	}

}
