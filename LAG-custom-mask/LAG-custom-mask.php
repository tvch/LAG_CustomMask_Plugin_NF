<?php

/*
 * Plugin Name: Custom Mask for NinjaForms
 * Version: 0.0.8
 * Description: Add custom Mask type V and removes regional formatting of calculation output (tested with version 3.3.21.2)
 * Author: Tobias Verbree
 * Author URI: https://github.com/tvch/LAG_CustomMask_Plugin_NF
 */

defined( 'ABSPATH' ) || die( '-1' );

final class LAG_CustomMask_Plugin
{
    public function __construct()
    {
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 100000 );
		add_action( 'admin_notices', array( $this, 'custom_admin_notice' ), 100000);
    }

    public function enqueue_scripts()
    {	
        wp_enqueue_script( 'nf-front-end--inputmask', plugin_dir_url( __FILE__ ) . 'front-end--inputmask-custom.min.js', array( 'jquery' ) ); // Override InputMask Script for special Case
		wp_enqueue_script( 'nf-front-end',      plugin_dir_url( __FILE__ ) . 'front-end-custom.js' , array( 'nf-front-end-deps' ) );
    }
	
	public function custom_admin_notice() { 
	
		echo '<div class="notice notice-info is-dismissible"><p>';
		echo 'Create a Backup of NinjaForms Plugin before attemping to update it. After the update make sure that the custom input mask and the calculations are still working';
		echo '</p></div>';
	
	}
}

new LAG_CustomMask_Plugin();