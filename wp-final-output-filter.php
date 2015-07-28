<?php defined('ABSPATH') OR die('No direct access.');
/*
Plugin Name: WP Final Output Filter
Plugin URI: http://www.freelancephp.net/wp-filter-final-output-entire-page
Description: Provides a filter for the whole output of the entire page, which is not default in WordPress.
Author: Victor Villaverde Laan
Version: 1.1.0
Author URI: http://www.freelancephp.net
License: Dual licensed under the MIT and GPL licenses
*/
if (!defined('WPFOF_VERSION')) {
    define('WPFOF_VERSION', '1.1.0');
}

// includes
if (!class_exists('WPDev_Plugin')) {
    require_once(dirname(__FILE__) . '/classes/WPDev/Plugin.php');
}
require_once(dirname(__FILE__) . '/classes/WPFOF.php');

// create plugin
WPFOF::create(array(
    'key' => 'wp-final-output-filter',
    'domain' => 'wp-final-output-filter',
    'optionName' => 'wp-final-output-filter-options',
    'adminPage' => 'wp-final-output-filter-settings',
    'file' => __FILE__,
    'dir' => dirname(__FILE__),
    'pluginUrl' => plugins_url('', __FILE__),
));
