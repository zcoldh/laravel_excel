<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->default('')->index()->comment('标题');
            $table->string('url')->default('')->comment('地址');
            $table->string('media_name')->default('')->comment('媒体名称');
            $table->timestamp('publish_time')->comment('发布日期');
            $table->text('description')->comment('摘要内容');
            $table->string('area')->default('')->comment('地域');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
