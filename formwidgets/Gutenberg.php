<?php namespace ReaZzon\Gutenberg\FormWidgets;

use Backend\Classes\FormWidgetBase;

/**
 * Gutenberg Form Widget
 */
class Gutenberg extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'gutenberg';

    /**
     * @inheritDoc
     */
    public function init()
    {
        if ($this->formField->disabled) {
            $this->readOnly = true;
        }
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('gutenberg');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['model'] = $this->model;
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        // Required dependencies
        // The Gutenberg editor expects React, ReactDOM, Moment and JQuery to be in the environment it runs in. 
        // An easy way to do this would be to add the following lines to your page:
        // Juqery already on page by default OctoberCMS env.
        $this->addJs('js/react.production.min.js', 'ReaZzon.Gutenberg');
        $this->addJs('js/react-dom.production.min.js', 'ReaZzon.Gutenberg');
        $this->addJs('js/moment.min.js', 'ReaZzon.Gutenberg');

        // Gutenberg assets
        $this->addCss('css/laraberg.css', 'ReaZzon.Gutenberg');
        $this->addJs('js/laraberg.js', 'ReaZzon.Gutenberg');

        // Formwidget assets
        $this->addJs('js/gutenberg.js', 'ReaZzon.Gutenberg');
        $this->addCss('css/gutenberg.css', 'ReaZzon.Gutenberg');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return $value;
    }
}
