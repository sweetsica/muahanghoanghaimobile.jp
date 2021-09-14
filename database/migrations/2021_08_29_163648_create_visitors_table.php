<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('vistor_clicked');
            $table->string('vistor_linkfrom')->nullable();
            $table->string('vistor_device')->nullable();
            $table->string('vistor_platform')->nullable();
            $table->string('vistor_ip')->nullable();
            $table->string('vistor_browser')->nullable();
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
        Schema::dropIfExists('visitors');
    }
}
