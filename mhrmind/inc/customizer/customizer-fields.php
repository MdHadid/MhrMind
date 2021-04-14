<?php
/**
 *	Customizer General Settings
 *	styles for logo/title - sizing, spacing ...
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Fields{

	/**
     * Holds the class object.
     *
     * @since 1.0.7
     *
     */

	public static $_instance;

	/**
     * Load Construct
     *
     * @since 1.0.7
     */

	public function __construct(){
		$this->xs_customizer_init();
	}

	/**
     * Customizer field Initialization
     *
     * @since 1.0.7
     *
     */

	public function xs_customizer_init(){
		add_filter( 'kirki/fields', array($this,'mhrmind_general_setting') );
	}

	public function mhrmind_general_setting( $guto_lite_fields ){

        require get_template_directory() . '/inc/customizer/header-settings.php' ;

        require get_template_directory() . '/inc/customizer/footer-settings.php' ;

		return $mhrmind_fields;
	}

	public static function xs_get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new Xs_Fields();
        }
        return self::$_instance;
    }
}
$Xs_Fields = Xs_Fields::xs_get_instance();
