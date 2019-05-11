<?php namespace ReaZzon\Gutenberg\Classes;

use Event;
use System\Classes\PluginManager;
use ReaZzon\Gutenberg\Models\Settings;

class Extenders 
{

    public static function Blog()
    {
        if (Settings::get('integration_blog', false) && 
            PluginManager::instance()->hasPlugin('RainLab.Blog'))
        {

            Event::listen('backend.form.extendFields', function ($widget) {

                // Only for RainLab.Blog Posts controller
                if (!$widget->getController() instanceof \RainLab\Blog\Controllers\Posts) {
                    return;
                }

                // Only for RainLab.Blog Post model
                if (!$widget->model instanceof \RainLab\Blog\Models\Post) {
                    return;
                }

                // Finding content field and changing it's type regardless whatever it already is.
                foreach ($widget->getFields() as $field) {
                    if ($field->fieldName === 'content'){
                        $field->config['type']      = 'gutenberg';
                        $field->config['widget']    = 'ReaZzon\Gutenberg\FormWidgets\Gutenberg';
                        $field->config['minheight'] = 500;
                    }
                }
            });
            
        }
    }

    /**
     * Static pages currently in work.
     * 
     * DONE:
     *      - Gutenberg.js working with content from static files.
     *      - Full work on master tab
     * 
     * TODO: 
     *      - Reload of formwidget everytime tab is changed. Gutenberg.js can't have mulitple instances at one page.
     * 
     */
    public static function StaticPages()
    {
        Event::listen('backend.form.extendFields', function ($widget) {
            if (!$widget->getController() instanceof \RainLab\Pages\Controllers\Index ||
                !$widget->model instanceof \RainLab\Pages\Classes\Page) {
                return; 
            }

            // Registering gutenberg formwidget
            $widget->addSecondaryTabFields([
                'markup' => [
                    'tab'     => 'rainlab.pages::lang.editor.content',
                    'type'    => 'gutenberg',
                    'stretch' => 'true'
                ]
            ]);
        });
    }
}