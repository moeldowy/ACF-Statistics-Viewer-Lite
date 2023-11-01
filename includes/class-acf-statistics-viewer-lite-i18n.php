<?php

namespace ACFStatisticsViewerLite\Includes;

/**
 * Define the internationalization functionality.
 */
class ACF_Statistics_Viewer_Lite_i18n {

    public function load_plugin_textdomain(): void {
        load_plugin_textdomain('acf-statistics-viewer-lite', false, dirname(plugin_basename(__FILE__), 2) . '/languages/');
    }
}
