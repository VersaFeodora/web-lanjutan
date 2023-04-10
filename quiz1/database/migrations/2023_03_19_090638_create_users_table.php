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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username',100)->unique();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('email',100)->unique();
            $table->string('phonenumber',20);
            $table->string('address',500);
            $table->foreignId('roles_id',2)->constrained();
            $table->string('password',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
