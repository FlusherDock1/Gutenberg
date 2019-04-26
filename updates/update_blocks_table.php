<?php namespace ReaZzon\Gutenberg\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class UpdateBlocksTable extends Migration
{
    public function up()
    {
        Schema::table('reazzon_gutenberg_blocks', function(Blueprint $table) {
            $table->text('title')->change();
        });
    }

    public function down()
    {
        Schema::table('reazzon_gutenberg_blocks', function(Blueprint $table) {
            $table->json('title')->change();
        });
    }
}
