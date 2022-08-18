<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Users::class);
            $table->date("dateLogin")->nullable();
            $table->date("dateLoggingOut")->nullable();
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
        Schema::dropIfExists('users_activities');
    }
}
