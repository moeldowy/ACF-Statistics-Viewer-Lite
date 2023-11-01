<?php

namespace ACFStatisticsViewerLite\Admin;

/**
 * Handles the admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and loads the admin-specific stylesheets and JavaScript.
 *
 * @package    ACF_Statistics_Viewer_Lite
 * @subpackage ACF_Statistics_Viewer_Lite/Admin
 */
class ACF_Statistics_Viewer_Lite_Admin {

    /**
     * Unique identifier for the plugin.
     *
     * @var string
     */
    private $plugin_name;

    /**
     * Current version of the plugin.
     *
     * @var string
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name Name of the plugin.
     * @param string $version Version of this plugin.
     */
    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register admin area stylesheets.
     */
    public function enqueue_styles() {
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/acf-statistics-viewer-lite-admin.css', [], $this->version, 'all');
    }

    /**
     * Register admin area JavaScript scripts.
     */
    public function enqueue_scripts() {
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/acf-statistics-viewer-lite-admin.js', ['jquery'], $this->version, false);
    }

    /**
     * Add an options page to the Settings menu.
     */
    public function add_options_page() {
        add_options_page(
            __('ACF Statistics Settings', 'acf-statistics-viewer-lite'),
            __('ACF Statistics', 'acf-statistics-viewer-lite'),
            'manage_options',
            $this->plugin_name,
            [$this, 'display_options_page']
        );
    }

    /**
     * Render the options page.
     */
    public function display_options_page() {
        include_once 'partials/acf-statistics-viewer-lite-admin-display.php';
    }
}
