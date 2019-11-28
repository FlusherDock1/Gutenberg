<?php namespace ReaZzon\Gutenberg\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    /**
     * @var string A unique code
     */
    public $settingsCode = 'reazzon_gutenberg_settings';

    /**
     * @var string Reference to field configuration
     */
    public $settingsFields = 'fields.yaml';
}