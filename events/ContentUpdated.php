<?php namespace ReaZzon\Gutenberg\Events;

use Illuminate\Queue\SerializesModels;

use ReaZzon\Gutenberg\Models\Content;

class ContentUpdated
{
    use SerializesModels;

    public $content;

    /**
     * Create a new event instance
     * 
     * @param ReaZzon\Gutenberg\Models\Content $content
     * @return void
     */
    public function __construct(Content $content)
    {
        $this->content = $content;
    }
}
