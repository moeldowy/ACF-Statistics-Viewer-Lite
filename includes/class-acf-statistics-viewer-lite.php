<?php
namespace ACFStatisticsViewerLite\Includes;

use ACFStatisticsViewerLite\Admin\ACF_Statistics_Viewer_Lite_Admin;
use ACFStatisticsViewerLite\Public\ACF_Statistics_Viewer_Lite_Public;

class ACF_Statistics_Viewer_Lite {
    protected string $plugin_name;
    protected string $version;
    protected ACF_Statistics_Viewer_Lite_Loader $loader;

    public function __construct() {
        if ( defined( 'ACF_STATISTICS_VIEWER_LITE_VERSION' ) ) {
            $this->version = ACF_STATISTICS_VIEWER_LITE_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'acf-statistics-viewer-lite';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies(): void {
        require_once plugin_dir_path( __FILE__ ) . 'class-acf-statistics-viewer-lite-loader.php';
        require_once plugin_dir_path( __FILE__ ) . 'class-acf-statistics-viewer-lite-i18n.php';
        require_once plugin_dir_path( __FILE__ ) . '../admin/class-acf-statistics-viewer-lite-admin.php';
        require_once plugin_dir_path( __FILE__ ) . '../public/class-acf-statistics-viewer-lite-public.php';

        $this->loader = new ACF_Statistics_Viewer_Lite_Loader();
    }

    private function set_locale(): void {
        $plugin_i18n = new ACF_Statistics_Viewer_Lite_i18n();
        $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
    }

    private function define_admin_hooks(): void {
        $plugin_admin = new ACF_Statistics_Viewer_Lite_Admin($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
        $this->loader->add_action('admin_menu', $plugin_admin, 'add_options_page');
    }

    private function define_public_hooks(): void {
        $plugin_public = new ACF_Statistics_Viewer_Lite_Public( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
    }

    public function run(): void {
        $this->loader->run();
    }

    public function get_plugin_name(): string {
        return $this->plugin_name;
    }

    public function get_version(): string {
        return $this->version;
    }
}
