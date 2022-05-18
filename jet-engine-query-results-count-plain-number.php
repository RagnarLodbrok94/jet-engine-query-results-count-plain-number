<?php
/**
 * Plugin Name: JetEngine - query results count plain number
 * Plugin URI: #
 * Description: Adds a new Dynamic Tag that allows you to return the number of query results as a simple number.
 * Version:     1.0.0
 * Author:      Crocoblock
 * Author URI:  https://crocoblock.com/
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'JET_EQRCPN__FILE__', __FILE__ );
define( 'JET_EQRCPN_PLUGIN_BASE', plugin_basename( JET_EQRCPN__FILE__ ) );
define( 'JET_EQRCPN_PATH', plugin_dir_path( JET_EQRCPN__FILE__ ) );

class Jet_Engine_Query_Results_Count_Plain_Number {

	public function __construct() {
		add_action( 'jet-engine/elementor-views/dynamic-tags/register', array( $this, 'register_dynamic_tags' ), 20 );
	}

	/**
	 * Register dynamic tags
	 *
	 * @return [type] [description]
	 */
	public function register_dynamic_tags( $tags_module ) {
		require_once JET_EQRCPN_PATH . 'dynamic-tags/plain-number.php';
		$tags_module->register_tag( new \Query_Results_Count_Plain_Number\Dynamic_Tags\Plain_Number() );
	}
}

new Jet_Engine_Query_Results_Count_Plain_Number();