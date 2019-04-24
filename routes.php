<?php

Route::group(['prefix' => 'laraberg', 'middleware' => ['web']], function () {
    Route::apiResource('blocks', 'ReaZzon\Gutenberg\Classes\BlockController');
    Route::get('oembed', 'ReaZzon\Gutenberg\Classes\OEmbedController');
});