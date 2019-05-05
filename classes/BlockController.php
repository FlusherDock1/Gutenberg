<?php namespace ReaZzon\Gutenberg\Classes;

use Request;
use ReaZzon\Gutenberg\Models\Block;

class BlockController extends ApplicationController
{
    public function index()
    {
        $blocks = Block::get();
        return $this->ok($blocks);
    }

    public function store(Request $request)
    {
        $block = new Block();
        $block->raw_title = $request::get('title');
        $block->status = $request::get('status');
        $block->setContent($request::get('content'));
        $block->updateSlug();
        $block->save();
        return $this->ok($block->toJson(), 201);
    }

    public function show(Request $request, $id)
    {
        $block = Block::find($id);
        if (!$block) {
            return $this->notFound();
        }
        return $this->ok($block);
    }

    public function update(Request $request, $id)
    {
        $block = Block::find($id);
        if (!$block) {
            return $this->notFound();
        }
        $block->raw_title = $request::get('title');
        $block->status = $request::get('status');
        $block->setContent($request::get('content'));
        $block->updateSlug();
        $block->save();
        return $this->ok($block);
    }

    public function destroy(Request $request, $id)
    {
        $block = Block::find($id);
        if (!$block) {
            return $this->notFound();
        }
        $block->delete();
        return $this->ok();
    }
}

