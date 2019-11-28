<?php namespace ReaZzon\Gutenberg\Events;

use ReaZzon\Gutenberg\Models\Content;
use Illuminate\Queue\SerializesModels;

class ContentCreated
{
    use SerializesModels;

    public $content;

    /**
     * Create a new event instance
     *
     * @param Content $content
     * @return void
     */
    public function __construct(Content $content)
    {
        $this->content = $content;
    }
}

