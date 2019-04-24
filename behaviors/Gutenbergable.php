<?php namespace ReaZzon\Gutenberg\Behaviors;

use System\Classes\ModelBehavior;
use ReaZzon\Gutenberg\Models\Content;
use ReaZzon\Gutenberg\Events\ContentCreated;
use ReaZzon\Gutenberg\Events\ContentUpdated;

class Gutenbergable extends ModelBehavior
{

    /**
     * Constructor
     */
    public function __construct($model)
    {
        parent::__construct($model);
        $model->morphOne['content'] = [Content::class, 'name' => 'contentable'];
    }
    
    /**
     * Returns the rendered HTML from the Content object
     * @return String
     */
    public function renderContent()
    {
        return $this->model->content->render();
    }

    /**
     * Returns the raw content that came out of Gutenberg
     * @return String
     */
    public function getRawContent()
    {
        return $this->model->content->raw_content;
    }

    /**
     * Returns the Gutenberg content with some initial rendering done to it
     * @return String
     */
    public function getRenderedContent()
    {
        return $this->model->content->rendered_content;
    }

    /**
     * Sets the content object using the raw editor content
     * @param String $content
     * @param String $save - Calls .save() on the Content object if true
     */
    public function setContent($content, $save = false)
    {   
        if (!$this->model->content) { $this->createContent(); }

        $this->model->content->setContent($content);
        if ($save) { $this->model->content->save(); }
        event(new ContentUpdated($this->model->content));
    }

    /**
     * Creates a content object and associates it with the parent object
     */
    private function createContent()
    {
        $content = new Content;
        $this->model->content()->save($content);
        $this->model->content = $content;
        event(new ContentCreated($content));
    }
}
