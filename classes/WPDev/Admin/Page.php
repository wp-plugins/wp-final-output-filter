<?php
/**
 * Class WPDev_Admin_Page
 *
 * Creating an admin options page with a menu item
 *
 * @package  WPDev
 * @category WordPress Library
 * @version  1.0.0
 * @author   Victor Villaverde Laan
 * @link     http://www.freelancephp.net/
 * @link     https://github.com/freelancephp/WPDev
 * @license  MIT license
 */
class WPDev_Admin_Page
{

    /**
     * Settings
     * @var array
     */
    protected $settings = array(
        'file' => null,
        'key' => null,
        'pageKey' => null,
        'pageTitle' => null,
        'mainMenu' => false,
        'menuIcon' => null,
        'defaultColumns' => 2,
        'maxColumns' => 2,
        'viewVars' => array(),
        'viewPage' => null, // f.e. full path + '/page.php',
        'viewMetabox' => null, // f.e. full path + '/{{key}}.php',
        'viewHelptab' => null, // f.e. full path + '/{{key}}.php',
    );

    /**
     * All metaboxes
     * @example
     *      array(
     *          'general' => array(
     *             'title' => 'General Settings',
     *             'position' => 'normal',
     *          ),
     *          'email' => array(
     *             'title' => 'Email Settings',
     *             'position' => 'normal',
     *          ),
     *      );
     * @var array
     */
    protected $metaboxes = array();

    /**
     * All helptabs
     * @example
     *      array(
     *          'main' => array(
     *              'title' => 'Uitleg',
     *           ),
     *      );
     * @var array
     */
    protected $helptabs = array();

    /**
     * Constructor
     * @param array $settings
     * @param array $metaboxes Optional
     * @param array $helptabs  Optional
     */
    public function __construct(array $settings, array $metaboxes = array(), array $helptabs = array())
    {
        $this->setSettings($settings);
        $this->metaboxes = $metaboxes;
        $this->helptabs = $helptabs;

        add_action('admin_menu', array($this, 'actionAdminMenu'));
    }

    /**
     * @param array $settings
     */
    protected function setSettings(array $settings)
    {
        foreach ($settings as $key => $value) {
            if (key_exists($key, $this->settings)) {
                $this->settings[$key] = $value;
            }
        }
    }

    /**
     * WP action callback
     */
    public function actionAdminMenu()
    {
        if ($this->settings['mainMenu']) {
            // create main menu item
            $pageHook = add_menu_page(
                $this->settings['pageTitle'],
                $this->settings['pageTitle'],
                'manage_options',
                $this->settings['pageKey'],
                array($this, 'showPage'),
                $this->settings['menuIcon']
            );
        } else {
            // create submenu item under "Settings"
            $pageHook = add_submenu_page(
                'options-general.php',
                $this->settings['pageTitle'],
                $this->settings['pageTitle'],
                'manage_options',
                $this->settings['pageKey'],
                array($this, 'showPage')
            );
        }

        // load plugin page
        add_action('load-' . $pageHook, array($this, 'loadPage'));
    }

    /**
     * WP action callback
     */
    public function loadPage()
    {
        // set dashboard postbox
        wp_enqueue_script('dashboard');

        // add help tabs
        $this->addHelptabs();

        // screen settings
        if (function_exists('add_screen_option')) {
            add_screen_option('layout_columns', array(
                'max' => $this->settings['maxColumns'],
                'default' => $this->settings['defaultColumns']
            ));
        }

        $this->addMetaboxes();
    }

    /**
     * Add metaboxes
     */
    public function addMetaboxes()
    {
        foreach ($this->metaboxes as $key => $params) {
            add_meta_box(
                $key,
                $params['title'],
                array($this, 'showMetabox'),
                null,
                $params['position'],
                'core',
                array($key)
            );
        }
    }

    /**
     * Show the content of a metabox
     * @param WP_Post $post
     * @param array $box
     */
    public function showMetabox($post, $box)
    {
        $key = $box['args'][0];
        $viewFile = str_replace('{{key}}', $key, $this->settings['viewMetabox']);

        echo $this->renderView($viewFile);
    }

    /**
     * Show complete admin page
     */
    public function showPage()
    {
        echo $this->renderView($this->settings['viewPage']);
    }

    /**
     * Add helptabs
     * @return void
     */
    public function addHelptabs()
    {
        if (!function_exists('get_current_screen')) {
            return;
        }

        $screen = get_current_screen();

        // help sidebar
        $viewFile = str_replace('{{key}}', 'sidebar', $this->settings['viewHelptab']);

        if (file_exists($viewFile)) {
            $helpText = $this->renderView($viewFile);
            $screen->set_help_sidebar($helpText);
        }

        // helptabs
        foreach ($this->helptabs as $key => $params) {
            // help tab
            $viewFile = str_replace('{{key}}', $key, $this->settings['viewHelptab']);
            $helpText = $this->renderView($viewFile);

            $screen->add_help_tab(array(
                'id' => $key,
                'title' => $params['title'],
                'content' => $helpText,
            ));
        }
    }

    /**
     * Render a view
     * @param string $file
     * @return string
     */
    protected function renderView($file) {
        return WPDev_View::create($file, $this->settings['viewVars'])->render(false);
    }

}
