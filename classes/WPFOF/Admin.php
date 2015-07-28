<?php
/**
 * Class WPFOF_Admin
 *
 * @package  WPFOF
 * @category WordPress Plugins
 * @author   Victor Villaverde Laan
 * @link     http://www.freelancephp.net/
 * @license  MIT license
 */
final class WPFOF_Admin extends WPDev_Admin_Page
{
    /**
     * Constructor
     * Init settings, metaboxes, helptabs etc
     */
    public function __construct(WPDev_Option $option)
    {
        $plugin = WPFOF::plugin();

        $settings = array(
            'file' => $plugin->getGlobal('file'),
            'key' => $plugin->getGlobal('key'),
            'pageKey' => $plugin->getGlobal('adminPage'),
            'pageTitle' => $plugin->__('Final Output Filter'),
            'menuIcon' => $plugin->getGlobal('pluginUrl') . '/images/icon-wp-final-output-filter-16.png',
            'mainMenu' => false,
            'viewVars' => array(
                'optionName' => $plugin->getGlobal('optionName'),
                'values' => $option->getValues(),
                'plugin' => $plugin,
            ),
            'viewPage' => $plugin->getGlobal('dir') . '/views/admin/page.php',
            'viewMetabox' => $plugin->getGlobal('dir') . '/views/admin/metaboxes/{{key}}.php',
            'viewHelptab' => $plugin->getGlobal('dir') . '/views/admin/helptabs/{{key}}.php',
        );

        $metaboxes = array(
            'filters' => array(
                'title' => $plugin->__('Filter Settings'),
                'position' => 'normal',
             ),
            'this-plugin' => array(
                'title' => $plugin->__('Support'),
                'position' => 'side',
             ),
            'other-plugins' => array(
                'title' => $plugin->__('Other Plugins'),
                'position' => 'side',
             ),
        );

        $helptabs = array(
            'filterhooks' => array(
                'title' => $plugin->__('Filter Hooks'),
             ),
            'faq' => array(
                'title' => $plugin->__('FAQ'),
             ),
        );

        parent::__construct($settings, $metaboxes, $helptabs);
    }

}
