<?php namespace ReaZzon\Gutenberg\Behaviors;

use System\Classes\ModelBehavior;
use ReaZzon\Gutenberg\Models\Content;
use ReaZzon\Gutenberg\Events\ContentCreated;
use ReaZzon\Gutenberg\Events\ContentUpdated;

class Gutenbergable extends ModelBehavior
{

    /**
     * Gutenbergable constructor.
     *
     * @param $model
     */
    public function __construct($model)
    {
        parent::__construct($model);
        $model->morphOne['content'] = [
            Content::class,
            'name' => 'contentable',
            'delete' => true
        ];
    }

    /**
     * Returns the rendered HTML from the Content object
     *
     * @return string
     */
    public function renderContent()
    {
        return $this->model->content->render();
    }

    /**
     * Returns the raw content that came out of Gutenberg
     *
     * @return string
     */
    public function getRawContent()
    {
        return $this->model->content->raw_content;
    }

    /**
     * Returns the Gutenberg content with some initial rendering done to it
     *
     * @return string
     */
    public function getRenderedContent()
    {
        return $this->model->content->rendered_content;
    }

    /**
     * Sets the content object using the raw editor content
     *
     * @param $content
     * @param bool $save Calls .save() on the Content object if true
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
