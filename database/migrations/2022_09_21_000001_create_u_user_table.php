<?php

use App\Enums\U_userFlStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_user', function (Blueprint $table) {
            $table->id();
            $table->string('kd_prsh', 4);
            $table->string('kd_kprd', 6);
            $table->string('gr_user', 11);
            $table->string('gr_mtra', 11)->nullable();

            $table->string('identifier', 60);
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->string('phone', 16)->nullable();
            $table->string('picture')->nullable();
            $table->unsignedTinyInteger('fl_stat')->default(U_userFlStatus::ACTIVE->value);
            $table->timestamp('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();

            $table->foreignId('created_by')->nullable()->references('id')->on('u_user');
            $table->foreignId('updated_by')->nullable()->references('id')->on('u_user');
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
        Schema::dropIfExists('u_user');
    }
};
