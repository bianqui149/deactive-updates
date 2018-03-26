<?php 

if ( ! defined( 'ABSPATH' ) ) exit;
class Menu_links {

	
    private $dir;
	private $file;
	
	public function __construct( $file ) {
		$this->file = $file;
		$this->dir = dirname( $this->file );
		
		// Add settings link to plugins page
		add_filter( 'plugin_action_links_' . plugin_basename( $this->file ) , array( $this, 'add_settings_link' ) );
	}
	
	public function add_settings_link( $links ) {
		$settings_link = '<a href="options-general.php?page=plugin_settings">' . __( 'Settings', 'plugin_textdomain' ) . '</a>';
  		array_push( $links, $settings_link );
  		return $links;
	}
	
	
}


