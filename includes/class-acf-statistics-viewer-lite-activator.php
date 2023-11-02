<?php

namespace ACFStatisticsViewerLite\Includes;

/**
 * Fired during plugin activation.
 */
class ACF_Statistics_Viewer_Lite_Activator {
    public static function activate(): void {
        register_activation_hook(__FILE__, 'acf_statistics_add_capabilities');
    }
}
