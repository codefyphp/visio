<?php

declare(strict_types=1);

use function Codefy\Framework\Helpers\config;

return function (\Qubus\Routing\Psr7Router $router) {
    $router
        ->any(
            uri: config(key: 'visio.general.assets_url') . '{any}',
            callback: 'PageBuilderController@assets'
        )
        ->where(['any' => '.*']);

    $router
        ->any(
            uri: config(key: 'visio.general.uploads_url') . '{any}',
            callback: 'PageBuilderController@uploads'
        )
        ->where(['any' => '.*']);

    if (config('visio.website_manager.use_website_manager')) {
        $router
            ->any(
                uri: config(key: 'visio.website_manager.url') . '{any}',
                callback: 'PageBuilderController@websiteManager'
            )
            ->where(['any' => '.*']);
    }

    if (config('visio.router.use_router')) {
        $router
            ->any(
                uri: '/{any}',
                callback: 'PageBuilderController@any'
            )
            ->where(['any' => '.*']);
    }
};
