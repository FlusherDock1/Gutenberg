<?php namespace ReaZzon\Gutenberg\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class UpdateBlocksTable extends Migration
{
    public function up()
    {
        Schema::table('reazzon_gutenberg_blocks', function(Blueprint $table) {
            $table->renameColumn('title', 'raw_title');
            $table->string('title')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('reazzon_gutenberg_blocks', function(Blueprint $table) {
            $table->text('raw_title')->nullable()->change();
            $table->renameColumn('raw_title', 'title');
        });
    }
}
