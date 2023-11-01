<?php

namespace ACFStatisticsViewerLite\Public;

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 * @package    ACF_Statistics_Viewer_Lite
 * @subpackage ACF_Statistics_Viewer_Lite/Public
 */
class ACF_Statistics_Viewer_Lite_Public {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private string $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private string $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name       The name of the plugin.
     * @param string $version           The version of this plugin.
     *
     * @since    1.0.0
     */
    public function __construct(string $plugin_name, string $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles(): void {
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/acf-statistics-viewer-lite-public.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts(): void {
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/acf-statistics-viewer-lite-public.js', array('jquery'), $this->version, false);
    }

    /**
     * Register the shortcode to display ACF statistics.
     *
     * @since    1.0.0
     */
    public function register_shortcode(): void {
        add_shortcode('acf_statistics', array($this, 'acf_statistics_shortcode'));
    }

    /**
     * The callback function to handle the ACF statistics shortcode.
     *
     * @param array $atts Shortcode attributes.
     * @return string Shortcode output.
     * @since    1.0.0
     */
    public function acf_statistics_shortcode(array $atts): string {
        ob_start(); // Start output buffering

        // Here you can fetch and display your ACF data based on the shortcode attributes
        // Example: $value = get_field('field_name', 'option'); if $value exists, display it.

        $this->display();

        return ob_get_clean(); // End output buffering and return the output
    }

    /**
     * Display the ACF statistics.
     *
     * @since    1.0.0
     */
    private function display(): void {
        include plugin_dir_path(__FILE__) . 'partials/acf-statistics-viewer-lite-public-display.php';
    }
}
