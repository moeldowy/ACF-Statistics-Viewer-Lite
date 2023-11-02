<?php
/**
 * The plugin bootstrap file
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           ACF_Statistics_Viewer_Lite
 *
 * @wordpress-plugin
 * Plugin Name:       ACF Statistics Viewer Lite
 * Description:       A plugin to view statistics of ACF fields.
 * Version:           1.0.0
 * Author:            Mohammed Salah
 * Author URI:        http://example.com
 * Text Domain:       acf-statistics-viewer-lite
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// Define the version of the plugin.
define('ACF_STATISTICS_VIEWER_LITE_VERSION', '1.0.0');

// Define the path to the plugin file.
define('ACF_STATISTICS_VIEWER_LITE_PLUGIN_FILE', __FILE__);

// Include the autoloader (if you have one).
// require_once plugin_dir_path(__FILE__) . 'includes/class-acf-statistics-viewer-lite-autoload.php';

/**
 * The code that runs during plugin activation.
 */
function activate_acf_statistics_viewer_lite(): void {
    require_once plugin_dir_path(__FILE__) . 'includes/class-acf-statistics-viewer-lite-activator.php';
    ACFStatisticsViewerLite\Includes\ACF_Statistics_Viewer_Lite_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_acf_statistics_viewer_lite(): void {
    require_once plugin_dir_path(__FILE__) . 'includes/class-acf-statistics-viewer-lite-deactivator.php';
    ACFStatisticsViewerLite\Includes\ACF_Statistics_Viewer_Lite_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_acf_statistics_viewer_lite');
register_deactivation_hook(__FILE__, 'deactivate_acf_statistics_viewer_lite');

/**
 * Begins execution of the plugin.
 */
function run_acf_statistics_viewer_lite(): void {
    require_once plugin_dir_path(__FILE__) . 'includes/class-acf-statistics-viewer-lite.php';
    $plugin = new ACFStatisticsViewerLite\Includes\ACF_Statistics_Viewer_Lite();
    $plugin->run();
}
run_acf_statistics_viewer_lite();
function acf_statistics_add_capabilities() {
    $role = get_role('editor'); // Change to the role you want
    $role?->add_cap('manage_options');
}
