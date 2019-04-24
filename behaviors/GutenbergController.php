<?php namespace ReaZzon\Gutenberg\Behaviors;

use ReaZzon\Gutenberg\Models\Content;
use Backend\Classes\ControllerBehavior;

class GutenbergController extends ControllerBehavior
{
    public function formExtendFields($form)
    {
        $config = $this->makeConfig('$/reazzon/gutenberg/models/content/fields.yaml');

        foreach ($config->fields as $field => $options) {
            $form->addFields([
                'content['.$field.']' => $options + [ 'type' => 'gutenberg']
            ]);
        }
    }

    public function formExtendModel($model)
    {
        if (!$model->content) {
            $model->content = new Content;
        }

        return $model;
    }
}