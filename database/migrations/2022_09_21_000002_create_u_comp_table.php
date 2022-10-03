<?php

use App\Enums\GlobalFlStatus;
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
        Schema::create('u_comp', function (Blueprint $table) {
            $table->id();
            $table->string('kd_prsh', 4);
            $table->string('kd_kprd', 6);
            $table->string('title');
            $table->string('title_short');
            $table->string('slogan');
            $table->longText('teaser');
            $table->string('author');
            $table->string('author_url')->nullable();
            $table->string('favicon');
            $table->string('logo');
            $table->string('address');
            $table->string('email');
            $table->string('phone', 16)->nullable();
            $table->longText('map_iframe');
            $table->string('map_url');
            $table->string('map_api')->nullable();
            $table->string('map_latitude')->nullable();
            $table->string('map_longitude')->nullable();
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('keywords');

            $table->longText('introduction');
            $table->longText('about');
            $table->longText('privacy_policy');
            $table->longText('term_and_condition');
            $table->unsignedTinyInteger('fl_stat')->default(GlobalFlStatus::ACTIVE->value);

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
        Schema::dropIfExists('u_comp');
    }
};
