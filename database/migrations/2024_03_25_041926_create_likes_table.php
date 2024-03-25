<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');  //누가 댓글을 달았는지
            $table->unsignedBigInteger('post_id');  //해당 포스팅에 댓글이 달렸는지
            // $table->boolean('is_like')->default(false);
            $table->softDeletes();  // deleted_at 만들어준다. 데베는 지우지는 않고 지운시간을 저장하고 가지고 있다.
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
        Schema::dropIfExists('likes');
    }
}
