<?php namespace ReaZzon\Gutenberg;

use App;
use Backend;
use System\Classes\PluginBase;
use ReaZzon\Gutenberg\Classes\Extenders;

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
            'author'      => 'Nick Khaetsky',
            'icon'        => 'icon-pencil-square-o',
            'homepage'    => 'https://github.com/FlusherDock1/Gutenberg'
        ];
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array|void
     */
    public function boot()
    {
        Extenders::RainLabBlog();
        Extenders::LovataGoodNews();
        Extenders::IndikatorNews();

        // Coming soon.
        // Extenders::StaticPages();
        //
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

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'reazzon.gutenberg.access_settings' => [
                'tab'   => 'reazzon.gutenberg::lang.plugin.name',
                'label' => 'reazzon.gutenberg::lang.permission.access_settings'
            ],
        ];
    }

    /**
     * Registers settings for this plugin
     *
     * @return array
     */
    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'reazzon.gutenberg::lang.settings.menu_label',
                'description' => 'reazzon.gutenberg::lang.settings.menu_description',
                'category'    => 'reazzon.gutenberg::lang.plugin.name',
                'icon'        => 'icon-cog',
                'class'       => 'ReaZzon\Gutenberg\Models\Settings',
                'order'       => 500,
                'permissions' => ['reazzon.gutenberg.access_settings']
            ]
        ];
    }
}
