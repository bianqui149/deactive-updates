<?php

/**
 * @author Julian Bianqui
 */
class MenuPage
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

    public function __construct()
    {

        add_action('admin_menu', array($this, 'my_admin_menu'));

    }

    public function my_admin_menu()
    {
        add_menu_page('Deactive Updates', 'Deactive Updates', 'manage_options', 'myplugin/myplugin-admin-page.php', array($this, 'myplguin_admin_page'), 'dashicons-dashboard', 50);
    }

    public function myplguin_admin_page()
    {

        ?>
    <div class="wrap">
        <h2>Global Custom Options</h2>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options')?>
            <p><strong>Deactive:</strong><br />
               Core Wordpress
               
               NO <input name="wordpress" type="radio" value="0" <?php checked( '0', get_option( 'wordpress' ) ); ?> />
			   YES<input name="wordpress" type="radio" value="1" <?php checked( '1', get_option( 'wordpress' ) ); ?> />
               <br>

               Plugins Update 
               NO <input name="plugins" type="radio" value="0" <?php checked( '0', get_option( 'plugins' ) ); ?> />
			   YES<input name="plugins" type="radio" value="1" <?php checked( '1', get_option( 'plugins' ) ); ?> />
               <br>
               Themes Update 
               NO <input name="themes" type="radio" value="0" <?php checked( '0', get_option( 'themes' ) ); ?> />
			   YES <input name="themes" type="radio" value="1" <?php checked( '1', get_option( 'themes' ) ); ?> />

            </p>
            <p><input type="submit" name="Submit" value="Save Options" /></p>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="wordpress,plugins,themes" />
            <br>
        </form>
    </div>
<?php
}
}

$MenuPage = MenuPage::instance();
?>