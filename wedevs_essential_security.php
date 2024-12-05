<?php 
/**
 * Plugin Name: Academy Essential Security Plugin
 * Plugin URI: https://wedevs.academy
 * Description: Essential security plugin for WordPress
 * Version: 0.1.0
 * Author: Firoz mahmud
 * Author URI: https://firoz.co
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: Essential-security
 */

 if(!defined('ABSPATH')) {
    exit;
 }

 class Wedevs_Essential_Security {

    private static $instance ;


    /**
     * Gets the single instance of the class.
     *
     * @since 0.1.0
     *
     * @access public
     *
     * @return Wedevs_Essential_Security
     */

    public static function get_instance() {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

      

    private function __construct() {    
        $this->require_classes();
    }


    /**
     * Requires the necessary classes.
     *
     * @since 0.1.0
     *
     * @access public
     *
     * @return void
     */

    public function require_classes() {
        require_once __DIR__ . '/includes/security.php';

        new Wedevs_Essential_Security_plugin();
        
    }

 }

 Wedevs_Essential_Security::get_instance();
