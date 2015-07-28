<?php
/**
 * Class WPFOF_Front
 *
 * @package  WPFOF
 * @category WordPress Plugins
 * @author   Victor Villaverde Laan
 * @link     http://www.freelancephp.net/
 * @license  MIT license
 */
final class WPFOF_Front
{

    /**
     * @param \WPDev_Option $option
     */
    public function __construct(WPDev_Option $option)
    {
        if ($option->getValue('finalOutputEnabled')) {
            $this->createFinalOutputFilter();
        }
        
        if ($option->getValue('widgetOutputEnabled')) {
            $this->createWidgetOutputFilter();
        }
    }

    protected function createFinalOutputFilter()
    {
        if (! WPDev_Filter_FinalOutput::isCreated()) {
            WPDev_Filter_FinalOutput::create('final_output');
        }
    }

    protected function createWidgetOutputFilter()
    {
        if (! WPDev_Filter_WidgetOutput::isCreated()) {
            // not very nice but need to get global WP var by reference
            global $wp_registered_widgets; 
            WPDev_Filter_WidgetOutput::create($wp_registered_widgets);
        }
    }

}
