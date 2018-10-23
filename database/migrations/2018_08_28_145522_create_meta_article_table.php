<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned()->default(0);
            $table->string('lang');
            $table->string('title');
            $table->text('text')->nullable();
            $table->text('annotation')->nullable();
            $table->string('keywords')->nullable();
            $table->text('aplications')->nullable();
            $table->text('finance')->nullable();
            $table->text('literature')->nullable();

//             $table->timestamps();
        });
        // create foreign keys
        Schema::table('meta_articles', function (Blueprint $table) {

            $table->foreign('article_id')->references('id')->on('articles')
                            ->onDelete('restrict')
                            ->onUpdate('restrict')
            ;
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meta_articles', function (Blueprint $table) {
            //
            $table->dropForeign('meta_articles_article_id_foreign');

        });

        Schema::dropIfExists('meta_articles');
    }
}
