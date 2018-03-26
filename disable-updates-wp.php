<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.dmanqn.com.ar
 * @since             1.0.0
 * @package           Disable_Updates_Wp
 *
 * @wordpress-plugin
 * Plugin Name:       Disable Updates Wp
 * Plugin URI:        www.dmanqn.com.ar
 * Description:       This plugin allows you to disable all updates
 * Version:           1.0.0
 * Author:            Bianqui Julián
 * Author URI:        www.dmanqn.com.ar
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       disable-updates-wp
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );
define( 'DISABLE_UPDATE',plugin_dir_path( __FILE__ ));


require_once DISABLE_UPDATE . '/admin/class-disable-updates-wp-admin.php';
require_once DISABLE_UPDATE . '/admin/class-disable-page-admin.php';
require_once DISABLE_UPDATE . '/admin/class-links-plugin.php';
$links = new Menu_Links( __FILE__ );


