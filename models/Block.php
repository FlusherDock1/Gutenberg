<?php namespace ReaZzon\Gutenberg\Models;

use Model;
use ReaZzon\Gutenberg\Helpers\BlockHelper;
use ReaZzon\Gutenberg\Helpers\EmbedHelper;

/**
 * Block Model
 */
class Block extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'reazzon_gutenberg_blocks';

    /**
     * @var array Add array attributes that do not have a corresponding column in your database
     */
    protected $appends = [
        'content',
        'title'
    ];

    /**
     * Updates slug according to title
     */
    public function updateSlug()
    {
        $this->slug = str_slug($this->raw_title, "-");
    }

    /**
     * Returns the rendered content of the block
     * @return string - The completely rendered content
     */
    public function render()
    {
        return BlockHelper::renderBlocks($this->rendered_content);
    }

    /**
     * Renders the content of the Block object
     * @return string
     */
    public function renderRaw()
    {
        return EmbedHelper::renderEmbeds($this->raw_content);
    }

    /**
     * Sets the raw content and performs some initial rendering
     * @param string $content
     */
    public function setContent($content)
    {
        $this->raw_content = $content;
        $this->renderRaw();
    }

    /**
     * Returns a content object similar to WordPress
     * @return array
     */
    public function getContentAttribute()
    {
        return [
            'raw' => $this->raw_content,
            'rendered' => $this->rendered_content
        ];
    }

    /**
     * Returns a content object similar to WordPress
     * @return array
     */
    public function getTitleAttribute()
    {
        return [
            'raw' => $this->raw_title,
        ];
    }
}
