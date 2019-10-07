<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('tag')->nullable();
            $table->string('image')->nullable();

            //ユーザーが削除されたら、そのユーザーが投稿したposts全て削除
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()//ロールバック時に削除
    {
        Schema::dropIfExists('posts');
    }
}
