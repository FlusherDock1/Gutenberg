<?php namespace ReaZzon\Gutenberg;

use App;
use Backend;
use System\Classes\PluginBase;

/**
 * Gutenberg Plugin
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'reazzon.gutenberg::lang.plugin.name',
            'description' => 'reazzon.gutenberg::lang.plugin.description',
            'author'      => 'ReaZzon, VanOns',
            'icon'        => 'icon-pencil-square-o'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerFormWidgets()
    {
        return [
            'ReaZzon\Gutenberg\FormWidgets\Gutenberg' => 'gutenberg',
        ];
    }
}
