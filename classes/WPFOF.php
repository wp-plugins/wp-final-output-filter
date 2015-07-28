<?php
/**
 * Class WPFOF
 *
 * @package  WPFOF
 * @category WordPress Plugins
 * @author   Victor Villaverde Laan
 * @link     http://www.freelancephp.net/
 * @license  MIT license
 */
final class WPFOF extends WPDev_Plugin
{
    /**
     * @var \WPFOF
     */
    protected static $instance = null;

    /**
     * Factory method
     * @param array $globals  Optional, only on first call
     */
    public static function create(array $globals = array())
    {
        self::$instance = new WPFOF($globals);
        return self::$instance;
    }

    /**
     * @return \WPML
     */
    public static function plugin()
    {
        return self::$instance;
    }

    /**
     * Init
     */
    protected function init()
    {
        add_action('init', array($this, 'actionInit'), 5);
    }

    /**
     * WP action callback
     */
    public function actionInit()
    {
        $option = $this->createOption();

        if (is_admin()) {
            // create admin
            (new WPFOF_Admin($option));
        } else {
            // create front
            (new WPFOF_Front($option));
        }
    }

    /**
     * @return \WPDev_Option
     */
    protected function createOption()
    {
        $defaultValues = array(
            'finalOutputEnabled' => 1,
            'widgetOutputEnabled' => 1,
        );

        $optionGroup = $this->getGlobal('key');
        $optionName = $this->getGlobal('optionName');

        // options instance
        $option = new WPDev_Option($optionGroup, $optionName, $defaultValues);

        return $option;
    }

}
