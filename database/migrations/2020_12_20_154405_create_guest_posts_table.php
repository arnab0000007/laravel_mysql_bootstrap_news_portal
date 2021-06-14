<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_posts', function (Blueprint $table) {
            $table->id();
            $table->string('author_name');
            $table->mediumText('post_title');
            $table->integer('category_id');
            $table->longText('post_description');
            $table->string('post_image')->default('defaultPostImage.jpg');
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
        Schema::dropIfExists('guest_posts');
    }
}
