<?php namespace ReaZzon\Gutenberg\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'reazzon_gutenberg_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}