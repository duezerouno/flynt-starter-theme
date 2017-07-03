<?php

namespace Flynt\Components\MapGoogle;

use Flynt\Features\Components\Component;
use Flynt\Features\Acf\OptionPages;
use Flynt\Utils\Asset;

add_action('wp_enqueue_scripts', function () {
    $enqueuedAssets = [
        [
            'type' => 'script',
            'name' => 'jquery-throttle-debounce',
            'path' => 'vendor/jquery-throttle-debounce.js',
            'dependencies' => ['jquery']
        ]
    ];

    Component::enqueueAssets('MapGoogle', $enqueuedAssets);
});

add_filter('Flynt/addComponentData?name=MapGoogle', function ($data) {
    $data['infoContent'] = htmlspecialchars(json_encode($data['infoContent']));
    $data['markerIcon'] = Asset::requireUrl('Components/MapGoogle/assets/marker.svg');
    $data['apiKey'] = OptionPages::get('globalOptions', 'feature', 'acf', 'googleMapsApiKey');
    return $data;
});