<?php namespace ReaZzon\Gutenberg\Classes;

use Illuminate\Http\Request;
use ReaZzon\Gutenberg\Helpers\EmbedHelper;

class OEmbedController extends ApplicationController
{
    public function __invoke(Request $request)
    {
        $embed = EmbedHelper::create($request->url);
        $data = EmbedHelper::serialize($embed);
        if ($data['html'] == null) {
            return $this->notFound();
        }
        return $this->ok($data);
    }
}

