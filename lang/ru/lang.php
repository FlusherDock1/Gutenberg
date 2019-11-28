<?php
return [
    'plugin' => [
        'name' => 'Gutenberg',
        'description' => 'Визуальный редактор Gutenberg для OctoberCMS'
    ],
    'permission' => [
        'access_settings' => 'Управление настройками плагина'
    ],
    'settings' => [
        'menu_label' => 'Настройки Gutenberg',
        'menu_description' => 'Управление интеграциями, и т.д.',
        'tab' => [
            'integrations' => [
                'name' => 'Интеграции',
                'warning' => [
                    'title' => 'Важно!',
                    'text' => 'Не рекомендуется заменять визуальный редактор у плагинов, где уже существует контент, 
                               так как Gutenberg вероятнее всего не сможет работать с ними.'
                ],
                'static_pages' => [
                    'name' => 'RainLab.StaticPages интеграция',
                    'comment' => 'Скоро.',
                ],
                'blog' => [
                    'name' => 'RainLab.Blog интеграция',
                    'comment' => 'Замена стандартного визуального редактора у поля `content` на Gutenberg.'
                ],
                'good_news' => [
                    'name' => 'Lovata.GoodNews интеграция',
                    'comment' => 'Замена стандартного визуального редактора у поля `content` на Gutenberg.'
                ],
                'indikator_news' => [
                    'name' => 'Indikator.News интеграция',
                    'comment' => 'Замена стандартного визуального редактора у поля `content` на Gutenberg.'
                ],
                'section_standard' => [
                    'name' => 'Стандартные плагины'
                ],
                'section_custom' => [
                    'name' => 'Сторонние плагины'
                ]
            ]
        ]
    ]
];