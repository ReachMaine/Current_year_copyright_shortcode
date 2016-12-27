<?php
/**
 * @package Current_Year_Copyright_Shortcode
 * @version 0.1.1
 */

/*
Plugin Name:Current Year Copyright Shortcode

Description: This plugin adds [current_year], [current_year_with_copyright] and [current_year_with_copyright_and_title] shortcodes.  Useful for keeping your website copyright date current.
Author: zig, based on similar plugin by Deepak Kumar Vellingiri
Version: 0.1

*/

defined( 'ABSPATH' ) or die( 'Direct access prohibited!' );

add_action( 'plugins_loaded', 'current_year_copyright_shortcode_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 0.1.1
 */
function current_year_copyright_shortcode_load_textdomain() {
  load_plugin_textdomain( 'current-year-copyright-shortcode', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}

/**
 * [current_year]
 *
 * Returns the Current Year as a string in four digits.
 */

function get_current_year() {
	$current_date = getdate();
	return $current_date[year];
	}

add_shortcode('current_year', 'get_current_year');

/**
 * [current_year_with_copyright_symbol]
 *
 * Returns the Current Year with a copyright symbol
 */
function get_current_year_with_copyright_symbol() {
	$current_date = getdate();
	return 	'&copy '.$current_date[year];
	}

add_shortcode('current_year_with_copyright', 'get_current_year_with_copyright_symbol');

/**
 * [current_year_with_copyright_symbol_and_title]
 *
 * Returns the Current Year with a copyright symbol with site title
 */
function get_current_year_with_copyright_symbol_and_title() {
	$current_date = getdate();
	$site_title = get_bloginfo( 'name' );
	return  $site_title .' &copy '.$current_date[year];
	}

add_shortcode('current_year_with_copyright_and_title', 'get_current_year_with_copyright_symbol_and_title');
