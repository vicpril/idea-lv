<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            // $table->string('title');
            $table->string('alias')->unique();
            // $table->integer('year')->unsigned();
            // $table->integer('tom')->unsigned()->default(1);

            // issue_id as forein key
            // status_id as forein key

            // $table->text('text');
            // $table->text('annotation');
            $table->string('doi', 100)->nullable();
            $table->string('udk', 100)->nullable();
            $table->timestamp('date_arrival')->nullable();
            $table->timestamp('date_review')->nullable();

            // $table->string('keywords')->nullable();


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
