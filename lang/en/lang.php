<?php
return [
    'plugin' => [
        'name' => 'Gutenberg',
        'description' => 'Gutenberg richeditor for OctoberCMS'
    ],
    'permission' => [
        'access_settings' => 'Manage plugin settings'
    ],
    'settings' => [
        'menu_label' => 'Gutenberg settings',
        'menu_description' => 'Manage integrations and etc.',
        'tab' => [
            'integrations' => [
                'name' => 'Integrations',
                'warning' => [
                    'title' => 'Warning!',
                    'text' => 'If you have posts that are created via another WISYWIG, 
                              Gutenberg will not work with it! And all your posts will look broken.'
                ],
                'static_pages' => [
                    'name' => 'RainLab.StaticPages Integration',
                    'comment' => 'Coming soon.'
                ],
                'blog' => [
                    'name' => 'RainLab.Blog Integration',
                    'comment' => 'Switching default visual editor in `content` field to Gutenberg.'
                ],
                'good_news' => [
                    'name' => 'Lovata.GoodNews Integration',
                    'comment' => 'Switching default visual editor in `content` field to Gutenberg.'
                ],
                'indikator_news' => [
                    'name' => 'Indikator.News Integration',
                    'comment' => 'Switching default visual editor in `content` field to Gutenberg. Use `content_render` attribute to get rendered gutenberg content.'
                ],
                'section_standard' => [
                    'name' => 'Standard plugins'
                ],
                'section_custom' => [
                    'name' => 'Second party plugins'
                ]
            ]
        ]
    ],
];