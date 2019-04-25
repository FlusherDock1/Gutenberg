# Gutenberg for OctoberCMS

Gutenberg is a rich-text visual editor from WordPress, with the features of bulidng content with blocks. With Gutenberg, you can create truly unique content for your website by simply dragging and dropping blocks.

You can test it online here [Gutenberg playground](https://testgutenberg.com/).

This plugin allows you to embed Gutenberg in the backend form of your own model by creating Polymorph relation .

**PLUGIN CURRENTLY IN BETA ALSO AS LARABERG.**

Integration of Laraberg by [VanOns\Laraberg](https://github.com/VanOns/laraberg) for OctoberCMS. All credits goes to VanOns.

All current block are from standart [Gutenberg.js](https://github.com/front/gutenberg-js) package. None of them are custom or from Laraberg. You can find all this blocks at [Gutenberg playground](https://testgutenberg.com/) and test them there.
 
**Working:**
- Common blocks
    - Paragraph - (All text formating also works).
    - Image _(only by link, file upload not working)_
    - Heading
    - Audio _(only by link, file upload not working)_
    - List
    - Quote
    - Video _(only by link, file upload not working)_
- Formatting
    - Code
    - Preformatted
    - Pull quote
    - Classic
    - Custom HTML
    - Table
    - Verse
- Layout elements
    - Columns
    - Button
    - Separator
    - Spacer
- Embeds
    - All embeds _(only by links)_
- Code preview and all standart features such as: custom styles, block settings – are also working.

**Not working:**
- Inline elements
    - Inline image _(Because of not implemented native Mediauploader)_
- Common blocks
    - Gallery _(Because of not implemented native Mediauploader)_
    - Cover _(Because of not implemented native Mediauploader)_
    - File _(Because of not implemented native Mediauploader)_
- Layout elements
    - Media & text _(Because of not implemented native Mediauploader)_
    - Page break _(Standart WordPress feature. Will be removed in next updates)_
    - More _(Standart WordPress feature. Will be removed in next updates)_
- Widgets
    - All of them not working _(They are standart WordPress widgets. They will be removed in next updates)_

**In work:**
- Mediauploader with native OctoberCMS Medialibrary

I will be happy if you help me with medialibrary implementation. Please sumbit your PR in [plugin Github Repository](https://github.com/FlusherDock1/Gutenberg).

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
---
Devloped by [reazzon.ru](https://reazzon.ru).