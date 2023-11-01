// Admin JavaScript for ACF Statistics Viewer Lite

document.addEventListener('DOMContentLoaded', function () {
    console.log('ACF Statistics Viewer Lite Admin is ready!');

    const updateButton = document.querySelector('#acf-statistics-viewer-lite-update');
    if (updateButton) {
        updateButton.addEventListener('click', function () {
            console.log('Updating Statistics...');
            // Here you can add AJAX call to update statistics

            // Dummy delay to simulate AJAX call
            setTimeout(() => {
                alert('Statistics Updated!');
                console.log('Statistics Updated!');
            }, 2000);
        });
    }

    const refreshButton = document.querySelector('#acf-statistics-viewer-lite-refresh');
    if (refreshButton) {
        refreshButton.addEventListener('click', function () {
            console.log('Refreshing Statistics...');
            // Here you can add AJAX call to refresh statistics view

            // Dummy delay to simulate AJAX call
            setTimeout(() => {
                alert('Statistics View Refreshed!');
                console.log('Statistics View Refreshed!');
            }, 2000);
        });
    }

    // Add any other admin-specific JavaScript functionality here
});
