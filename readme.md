# Gutenberg for OctoberCMS

**PLUGIN CURRENTLY IN BETA ALSO AS LARABERG.**

Integration of Laraberg by [VanOns\Laraberg](https://github.com/VanOns/laraberg) for OctoberCMS. All credits goes to VanOns.

Working:
- Common blocks
- Formatting
- Layout elements
- Embeds

Not working:
- Widgets (they are mostly from WP :) so anyway)
- Mediauploader (You can only paste links)

Laraberg is currently in beta so is Gutenberg for OctoberCMS.

## Installation

Install plugin by OctoberCMS plugin udpater.

Go to Settings->Updates&Plugins and find Gutenberg in search click on icon and install it.

## Installation

Install plugin by OctoberCMS plugin udpater.

Go to Settings->Updates&Plugins and find Gutenberg in search click on icon and install it.

## Usage

This plugin works only by implementing Gutenberg behavior in your model. 
It will create morphOne relation with Gutenberg/Content model.

Go to your model and add behavior in $implement array:

```php
public $implement = ['ReaZzon.Gutenberg.Behaviors.Gutenbergable'];
```

After you need to add behavior to $implement in your model controller.

```php
public $implement = ['ReaZzon.Gutenberg.Behaviors.GutenbergController'];
```

Done. Your model now has morphOne with Gutenberg Content Model by 'content' field.

## Rendering

Rendering examples below. 

```twig
{{ post.content.render }}
```
 
```php
$post->content->render();
```

[reazzon.ru](https://reazzon.ru)
