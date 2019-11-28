<?php namespace ReaZzon\Gutenberg\Helpers;

use Embed\Embed;

class EmbedHelper
{

    /**
     * Renders any embeds in the HTML
     * @param string $html
     * @return string - The HTML containing all embed code
     */
    public static function renderEmbeds($html)
    {
        $regex = '/<!-- wp:core-embed\/.*?-->\s*?<figure class="wp-block-embed.*?".*?<div class="wp-block-embed__wrapper">\s*?(.*?)\s*?<\/div><\/figure>/';
        return preg_replace_callback($regex, function ($matches) {
            $embed = self::createEmbed($matches[1]);
            $url = preg_replace('/\//', '\/', preg_quote($matches[1]));
            return preg_replace("/>\s*?$url\s*?</", ">$embed->code<", $matches[0]);
        }, $html);
    }

    /**
     * Creates an embed from a URL
     * @param $url
     * @return \Embed\Adapters\Adapter
     */
    public static function createEmbed($url)
    {
        return Embed::create($url);
    }
}

