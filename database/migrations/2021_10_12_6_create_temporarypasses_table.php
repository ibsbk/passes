<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateTemporarypassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporarypasses', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('name');
            $table->string('second_name');
            $table->string('email');
            $table->string('photo');
            $table->string('purpose');
            $table->string('random_id')->unique();
            $table->foreignId('type_id');
            $table->foreign('type_id')->references('id')->on('passtypes');
            $table->foreignId('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->timestamps();
            $table->date('start_action')->default(Carbon::now());
            $table->date('end_action')->default(Carbon::now()->addWeeks(2));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temporarypasses');
    }
}
