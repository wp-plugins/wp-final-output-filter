<?php
/**
 * Class WP_Filter_FinalOutput
 *
 * @sinlgeton
 *
 * @package  WP_Filter
 * @category WordPress Filter
 * @version  1.0.0
 * @author   Victor Villaverde Laan
 * @link     http://www.freelancephp.net/
 * @license  MIT license
 *
 * @example
 *
 *      WP_Filter_FinalOutput::create('wp_final_output');
 *
 *      add_filter('wp_final_output', 'wp_replace_b_tags', 10, 1);
 *
 *      function wp_replace_b_tags($content) {
 *          $content = str_replace('<b>', '<strong>', $content);
 *          $content = str_replace('</b>', '</strong>', $content);
 *          return $content;
 *      }
 */
class WP_Filter_FinalOutput
{

    /**
     * Filter name
     * @var string
     */
    protected $filterName = null;

    /**
     * Factory method
     * @param string $filterName
     * @return \WP_Filter_FinalOutput
     */
    public static function create($filterName)
    {
        $instance = new WP_Filter_FinalOutput($filterName);
        return $instance;
    }

    /**
     * Constructor / initialize
     * @param string $filterName
     */
    private function __construct($filterName)
    {
        $this->filterName = $filterName;

        add_action('wp', array($this, 'bufferStart'), 1);
    }

    /**
     * Start buffer
     */
    public function bufferStart() {
        ob_start(array($this, 'filterOutput'));
    }

    /**
     * @param string $content
     * @return string
     */
    public function filterOutput($content) {
        $content = apply_filters($this->filterName, $content);
        return $content;
    }

}
