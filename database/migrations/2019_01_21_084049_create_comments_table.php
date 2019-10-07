<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('post_id')->unsigned()->index();

            $table->string('comment')->nullable();
            //postが削除されたら、そのpostのコメント削除
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            //ユーザーが削除されたらユーザーが投稿したコメント全て駆除
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
}
