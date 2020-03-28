# Gutenberg for OctoberCMS
**PLUGIN CURRENTLY IN BETA.** 

[This text in russian](https://octoclub.ru/d/70-gutenberg-%D0%B2%D0%B8%D0%B7%D1%83%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9-dragdrop-%D1%80%D0%B5%D0%B4%D0%B0%D0%BA%D1%82%D0%BE%D1%80-%D0%B1%D0%BB%D0%BE%D0%BA%D0%BE%D0%B2-%D0%B4%D0%BB%D1%8F-%D0%BF%D0%BB%D0%B0%D0%B3%D0%B8%D0%BD%D0%BE%D0%B2)

Gutenberg is a rich-text visual editor from WordPress, with the features of bulidng content with blocks. With Gutenberg, you can create truly unique content for your website by simply dragging and dropping blocks.

You can test it online here [Gutenberg playground](https://testgutenberg.com/).

This plugin allows you to embed Gutenberg in the backend form of your own model by creating Polymorph relation .

Integration of Laraberg by [VanOns\Laraberg](https://github.com/VanOns/laraberg) for OctoberCMS. All credits goes to VanOns.
 
**Working integrations:**
- [RainLab.Blog](https://octobercms.com/plugin/rainlab-blog)
- [Lovata.GoodNews](https://octobercms.com/plugin/lovata-goodnews)
- [Indikator.News](https://octobercms.com/plugin/indikator-news)

**Coming Soon integrations:**
- [RainLab.StaticPages](https://octobercms.com/plugin/rainlab-pages)

**Available blocks:**
- Code preview and all standard features such as: custom styles, block settings, reusable blocks.
- Common blocks
    - Paragraph - (All text formatting also works).
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
    
**In work:**
- ~~Mediauploader with native OctoberCMS Medialibrary~~ **DONE in 1.0.7 update** 
- ~~Reusable blocks aren't working~~ **DONE in 1.0.8 update**
- ~~Removing WP widgets~~ **DONE in 1.0.9 update**
- ~~RainLab.Blog integration~~ **DONE in 1.1.0 update**
- ~~Lovata.GoodNews integration~~ **DONE in 1.1.2 update**
- ~~Migration to release version of Laraberg~~ **DONE in 1.2.0 update**
- ~~Indikator.News integration~~ **DONE in 1.2.5 update**
- RainLab.StaticPages integration

**Later work:**
- Inline image incorrect behavior (Gutenberg.js bug, need updates from them)
- Multiple instances of Gutenberg on one page (Gutenberg.js bug, need updates from them)

I will be happy if you help me with any form of custom functions implementation. 

Please sumbit your PR in [plugin Github Repository](https://github.com/FlusherDock1/Gutenberg).

### Notes

As we now on Laraberg 1.0.0-rc.1, i will investigate more about creating multiple instances of Gutenberg on one page.

---
## Installation

Install plugin by OctoberCMS plugin updater.

Go to Settings –> Updates&Plugins find Gutenberg in plugin search. Click on icon and install it.

or via Composer

```
composer require reazzon/gutenberg
```

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

Done. Your model now has morphOne with `Gutenberg\Content` Model by `content` field that **renders only on created model page**.



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

If you want to add some features you can work with source files of Laraberg in `/plugins/reazzon/gutenberg/formwidgets/gutenberg/assets/resources`, to set up all environment follow these steps:
 
1. Clone Gutenberg rep.:
`git clone https://github.com/WordPress/gutenberg.git gutenberg`
2. After cloning execute these commands:
    ```bash
    cd gutenberg           // go to Gutenberg folder
    npm i                  // install all dependencies
    npm run build          // Build Gutenberg
    sudo npm link          // Link it to your global node_modules 
    cd ..                  // Go back to Laraberg root
    npm i                  // install all dependencies
    npm link gutenberg     // Link Gutenberg package to Laraberg
    ```
3. Now you set up.
---
Developed by [reazzon.ru](https://reazzon.ru)

Russian OctoberCMS developer community [OctoClub.ru](https://octoclub.ru)
