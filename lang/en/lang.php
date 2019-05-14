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
                'static_pages' => [
                    'name' => 'RainLab.StaticPages Integration',
                    'comment' => 'Coming soon.'
                ],
                'blog' => [
                    'name' => 'RainLab.Blog Integration',
                    'comment' => 'Switching default visual editor in post editing form to Gutenberg.
                                  Attention! If you have posts that are created via another WISYWIG, Gutenberg will not work with it! And all your posts will look broken.
                                  I\'m not recommending switching visual editor on already working web-site.'
                ],
                'good_news' => [
                    'name' => 'Lovata.GoodNews Integration',
                    'comment' => 'Switching default visual editor in post editing form to Gutenberg.
                                  Attention! If you have posts that are created via another WISYWIG, Gutenberg will not work with it! And all your posts will look broken.
                                  I\'m not recommending switching visual editor on already working web-site.'
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