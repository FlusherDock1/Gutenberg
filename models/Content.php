<?php namespace ReaZzon\Gutenberg\Models;

use Model;
use ReaZzon\Gutenberg\Events\ContentRendered;
use ReaZzon\Gutenberg\Helpers\BlockHelper;
use ReaZzon\Gutenberg\Helpers\EmbedHelper;

/**
 * Content Model
 */
class Content extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'reazzon_gutenberg_contents';

    /**
     * @var array Relations
     */
    public $morphTo = [
        'contentable' => []
    ];

    /**
     * Returns the rendered content of the content
     * @return String - The completely rendered content
     */
    public function render()
    {
        $html = BlockHelper::renderBlocks($this->rendered_content);
        return "<div class='gutenberg__content wp-embed-responsive'>$html</div>";
    }

    /**
     * Sets the raw content and performs some initial rendering
     * @param String $html
     */
    public function beforeSave()
    {
        $this->renderRaw();
    }

    /**
     * Renders the HTML of the content object
     */
    public function renderRaw()
    {
        $this->rendered_content = EmbedHelper::renderEmbeds($this->raw_content);
        // event(new ContentRendered($this));
        return $this->rendered_content;
    }
}
