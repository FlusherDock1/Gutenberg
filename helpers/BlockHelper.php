<?php namespace ReaZzon\Gutenberg\Helpers;

use ReaZzon\Gutenberg\Models\Block;

class BlockHelper
{
    /**
     * Renders any blocks in the HTML (recursively)
     * @param $html
     * @return string|string[]|null
     */
    public static function renderBlocks($html)
    {
        return preg_replace_callback('/<!-- wp:block {"ref":(\d*)} \/-->/', function ($matches) {
            return self::renderBlock($matches[1]);
        }, $html);
    }

    /**
     * Returns the HTML of the Block with $id
     * @param $id
     * @return string
     */
    private static function renderBlock($id)
    {
        if ($block = Block::find($id)) {
            return $block->render();
        }

        return 'Block not found';
    }
}
