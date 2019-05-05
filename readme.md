# Gutenberg for OctoberCMS
**MEDIAUPLOADER AND REUSABLE BLOCKS UPDATES IS LIVE**

Gutenberg is a rich-text visual editor from WordPress, with the features of bulidng content with blocks. With Gutenberg, you can create truly unique content for your website by simply dragging and dropping blocks.

You can test it online here [Gutenberg playground](https://testgutenberg.com/).

This plugin allows you to embed Gutenberg in the backend form of your own model by creating Polymorph relation .

**PLUGIN CURRENTLY IN BETA ALSO AS LARABERG.**

Integration of Laraberg by [VanOns\Laraberg](https://github.com/VanOns/laraberg) for OctoberCMS. All credits goes to VanOns.

All current block are from standart [Gutenberg.js](https://github.com/front/gutenberg-js) package. None of them are custom or from Laraberg. You can find all this blocks at [Gutenberg playground](https://testgutenberg.com/) and test them there.
 
**Working:**
- Code preview and all standart features such as: custom styles, block settings, reusable blocks.
- Common blocks
    - Paragraph - (All text formating also works).
    - Image
    - Heading
    - Audio
    - Gallery
    - Cover
    - File
    - List
    - Quote
    - Video
- Formatting
    - Code
    - Preformatted
    - Pull quote
    - Classic
    - Custom HTML
    - Table
    - Verse
- Layout elements
    - Media & text
    - Columns
    - Button
    - Separator
    - Spacer
- Embeds
    - All embeds

**Not working:**
- Inline elements
    - Inline image _(Because of gutenberg.js bug, currently in work)_
    
**In work:**
- ~~Mediauploader with native OctoberCMS Medialibrary~~ **DONE in 1.0.7 update** 
- ~~Reusable blocks aren't working~~ **DONE in 1.0.8 update**
- ~~Removing WP widgets~~ **DONE in 1.0.9 update**
- Inline image incorrect behavior

I will be happy if you help me with any form of custom functions implementation. Please sumbit your PR in [plugin Github Repository](https://github.com/FlusherDock1/Gutenberg).

---
## Installation

Install plugin by OctoberCMS plugin updater.

Go to Settings –> Updates&Plugins find Gutenberg in plugin search. Click on icon and install it.

## Usage

This plugin works only by implementing Gutenberg behavior in your model. 
It will create morphOne relation with `Gutenberg\Content` model.

Go to your model and add behavior in $implement array:

```php
public $implement = ['ReaZzon.Gutenberg.Behaviors.Gutenbergable'];
```

After you need to add behavior to $implement array in your model controller.

```php
public $implement = ['ReaZzon.Gutenberg.Behaviors.GutenbergController'];
```

Done. Your model now has morphOne with `Gutenberg\Content` Model by `content` field.

## Rendering

Rendering examples below. 

```twig
{{ post.content.render }}
```
 
```
$post->content->render();
```

In order to correctly display Gutenberg styles. You must add laraberg public styles to your page:
```html
<link href="/plugins/reazzon/gutenberg/assets/laraberg.min.css" rel="stylesheet">
```

## Working with source js code

If you want add some features you can work with source react files in /formwidgets/gutenberg/assets/resources folder run following commands:
```bash
npm i
npm run watch
```

---
Devloped by [reazzon.ru](https://reazzon.ru).