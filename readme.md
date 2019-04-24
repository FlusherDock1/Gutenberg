# Gutenberg for OctoberCMS

Integration of Laraberg by [VanOns\Laraberg](https://github.com/VanOns/laraberg) for OctoberCMS. All credits goes to VanOns.

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

Done. Just open model form and your Gutenberg is ready to go!


[reazzon.ru](https://reazzon.ru)