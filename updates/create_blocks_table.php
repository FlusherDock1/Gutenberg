<?php namespace ReaZzon\Gutenberg\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateBlocksTable extends Migration
{
    public function up()
    {
        Schema::create('reazzon_gutenberg_blocks', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('title');
            $table->text('raw_content')->nullable();
            $table->text('rendered_content')->nullable();
            $table->string('status');
            $table->string('slug');
            $table->string('type')->default('wp_block');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reazzon_gutenberg_blocks');
    }
}
