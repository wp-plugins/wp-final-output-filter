<?php defined('ABSPATH') OR die('No direct access.');
/*
Plugin Name: WP Final Output Filter
Plugin URI: http://www.freelancephp.net/wp-filter-final-output-entire-page
Description: Provides a filter for the whole output of the entire page, which is not default in WordPress.
Author: Victor Villaverde Laan
Version: 1.0.0
Author URI: http://www.freelancephp.net
License: Dual licensed under the MIT and GPL licenses
*/

// includes
require_once(dirname(__FILE__) . '/classes/WP/Filter/FinalOutput.php');

// init
WP_Filter_FinalOutput::create('wp_final_output');
