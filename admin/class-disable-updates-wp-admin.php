<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.dmanqn.com.ar
 * @since      1.0.0
 *
 * @package    Disable_Updates_Wp
 * @subpackage Disable_Updates_Wp/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Disable_Updates_Wp
 * @subpackage Disable_Updates_Wp/admin
 * @author     Bianqui Julián <info@dmanqn.com>
 */
class Disable_Updates
{

    /**
     * Used for singleton class
     * @staticvar instance
     */
    static $instance = null;
    /**
     * @var constant standarize the save action key
     */
    /**
     * Used to keep a singleton of the current class
     * @return Class
     */
    public static function instance()
    {
        if (!self::$instance) {
            $class          = __CLASS__;
            self::$instance = new $class;
        }
        return self::$instance;
    }

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct()
    {

        add_filter('pre_site_transient_update_core', array($this, 'remove_core_updates_wordpress'));
        add_filter('pre_site_transient_update_plugins', array($this, 'remove_core_updates_plugins'));
        add_filter('pre_site_transient_update_themes', array($this, 'remove_core_updates_themes'));

    }

    public function remove_core_updates_wordpress()
    {
        global $wp_version;return (object) array('last_checked' => time(), 'version_checked' => $wp_version);
    }

    public function remove_core_updates_plugins()
    {	

    	$plugins = get_option( 'plugins' );
        if ($plugins == 1) {
            global $wp_version;return (object) array('last_checked' => time(), 'version_checked' => $wp_version);
        }
    }

    public function remove_core_updates_themes()
    {
        global $wp_version;return (object) array('last_checked' => time(), 'version_checked' => $wp_version);
    }

}
$disable = Disable_Updates::instance();
