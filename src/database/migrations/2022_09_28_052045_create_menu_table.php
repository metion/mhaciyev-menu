<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('sort_order')->index()->default(0);
            $table->boolean('target_mode')->default(false);
            $table->boolean('active')->default(true);
            $table->json('value')->nullable();
            $table->timestamps();

            $table->foreign('group_id')->references('id')->on('menu_group')->onDelete('CASCADE');
            $table->foreign('parent_id')->references('id')->on('menu')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
};
