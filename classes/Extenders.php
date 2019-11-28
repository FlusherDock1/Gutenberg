<?php namespace ReaZzon\Gutenberg\Classes;

use Event;
use System\Classes\PluginManager;
use ReaZzon\Gutenberg\Models\Settings;
use ReaZzon\Gutenberg\Helpers\BlockHelper;
use ReaZzon\Gutenberg\Helpers\EmbedHelper;

class Extenders
{

    public static function RainLabBlog()
    {
        if (Settings::get('integration_blog', false) &&
            PluginManager::instance()->hasPlugin('RainLab.Blog')) {

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
                    if ($field->fieldName === 'content') {
                        $field->config['type'] = 'gutenberg';
                        $field->config['widget'] = 'ReaZzon\Gutenberg\FormWidgets\Gutenberg';
                        $field->config['minheight'] = 500;
                    }
                }
            });

            // Replacing original content_html attribute.
            \RainLab\Blog\Models\Post::extend(function ($model) {
                $model->bindEvent('model.getAttribute', function ($attribute, $value) use ($model) {
                    if ($attribute == 'content_html') {
                        return "<div class='gutenberg__content wp-embed-responsive'>" .
                            BlockHelper::renderBlocks(EmbedHelper::renderEmbeds($value))
                        . "</div>";
                    }
                });
            });
        }
    }

    public static function LovataGoodNews()
    {
        if (Settings::get('integration_good_news', false) &&
            PluginManager::instance()->hasPlugin('Lovata.GoodNews')) {

            Event::listen('backend.form.extendFields', function ($widget) {

                // Only for Lovata.GoodNews Articles controller
                if (!$widget->getController() instanceof \Lovata\GoodNews\Controllers\Articles) {
                    return;
                }

                // Only for Lovata.GoodNews Article model
                if (!$widget->model instanceof \Lovata\GoodNews\Models\Article) {
                    return;
                }

                // Finding content field and changing it's type regardless whatever it already is.
                foreach ($widget->getFields() as $field) {
                    if ($field->fieldName === 'content') {
                        $field->config['type'] = 'gutenberg';
                        $field->config['widget'] = 'ReaZzon\Gutenberg\FormWidgets\Gutenberg';
                        $field->config['minheight'] = 500;
                    }
                }
            });

            // Replacing original content attribute.
            \Lovata\GoodNews\Classes\Item\ArticleItem::extend(function ($elementItem) {
                $elementItem->addDynamicMethod('getContentAttribute', function () use ($elementItem) {
                    return "<div class='gutenberg__content wp-embed-responsive'>" .
                        BlockHelper::renderBlocks(EmbedHelper::renderEmbeds($elementItem->getAttribute('content')))
                    . "</div>";
                });
            });
        }
    }

    public static function IndikatorNews()
    {
        if (Settings::get('integration_indikator_news', false) &&
            PluginManager::instance()->hasPlugin('Indikator.News')) {

            Event::listen('backend.form.extendFields', function ($widget) {

                // Only for Indikator.News Posts controller
                if (!$widget->getController() instanceof \Indikator\News\Controllers\Posts) {
                    return;
                }

                // Only for Indikator.News Post model
                if (!$widget->model instanceof \Indikator\News\Models\Posts) {
                    return;
                }

                // Finding content field and changing it's type regardless whatever it already is.
                foreach ($widget->getFields() as $field) {
                    if ($field->fieldName === 'content') {
                        $field->config['type'] = 'gutenberg';
                        $field->config['widget'] = 'ReaZzon\Gutenberg\FormWidgets\Gutenberg';
                        $field->config['minheight'] = 500;
                    }
                }
            });

            // Replacing original content_html attribute.
            \Indikator\News\Models\Posts::extend(function ($model) {
                $model->addDynamicMethod('getContentRenderAttribute', function () use ($model) {
                    return "<div class='gutenberg__content wp-embed-responsive'>" .
                        BlockHelper::renderBlocks(EmbedHelper::renderEmbeds($model->getAttribute('content')))
                    . "</div>";
                });
            });
        }
    }

    /**
     * Static pages currently in work.
     *
     *
     * DONE:
     *      - Gutenberg.js working with content from static files.
     *      - Full work on master tab
     *
     * TODO:
     *      - I'm helpless here, need to wait for some updates from https://github.com/front/g-editor
     *
     */
    public static function StaticPages()
    {
//        Event::listen('backend.form.extendFields', function ($widget) {
//            if (!$widget->getController() instanceof \RainLab\Pages\Controllers\Index ||
//                !$widget->model instanceof \RainLab\Pages\Classes\Page) {
//                return;
//            }
//
//            // Registering gutenberg formwidget
//            $widget->addSecondaryTabFields([
//                'markup' => [
//                    'tab' => 'rainlab.pages::lang.editor.content',
//                    'type' => 'gutenberg',
//                    'stretch' => 'true'
//                ]
//            ]);
//        });
    }


}