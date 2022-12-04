<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->text('article_title');
            $table->text('article_detail')->nullable();
            $table->json('questionnaire_1')->nullable();
            $table->json('questionnaire_2')->nullable();
            $table->json('questionnaire_3')->nullable();
            $table->json('questionnaire_4')->nullable();
            $table->json('questionnaire_5')->nullable();
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
};
