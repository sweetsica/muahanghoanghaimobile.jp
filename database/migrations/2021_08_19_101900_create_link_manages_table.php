<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkManagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_manages', function (Blueprint $table) {
            $table->id();
            $table->string('name_camp', 100);
            $table->longText('url_source');
            $table->string('id_camp')->nullable();
            $table->string('id_group')->nullable();
            $table->string('id_ads')->nullable();
            $table->string('link_final',754)->unique();
            $table->boolean('status')->default('1');
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
        Schema::dropIfExists('link_manages');
    }
}
