<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title');
            $table->text('body');
            $table->softDeletes();  // deleted_at 만들어준다. 데베는 지우지는 않고 지운시간을 저장하고 가지고 있다.
            $table->timestamps();

            // users 테이블과 외래키 설정
            $table->foreign('user_id') //posts 테이블의 user_id 컬럼을 연결하겠다
                ->references('id')  // 참조하겠다
                ->on('users')   // users 테이블을
                ->onDelete('cascade');   //users 테이블의 id가 삭제되면 posts와 연관되어있는 데이터 삭제됨
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
