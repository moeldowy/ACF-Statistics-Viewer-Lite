<?php

namespace ACFStatisticsViewerLite\Includes;

/**
 * Fired during plugin deactivation.
 */
class ACF_Statistics_Viewer_Lite_Deactivator {
    public static function deactivate(): void {
        register_deactivation_hook(__FILE__, 'acf_statistics_remove_capabilities');
    }
}
