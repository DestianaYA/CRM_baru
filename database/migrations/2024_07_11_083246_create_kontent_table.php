<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontentTable extends Migration
{
public function up()
{
    Schema::create('kontent', function (Blueprint $table) {
        $table->id();
        $table->string('role');
        $table->text('notif')->nullable();
        $table->text('sk')->nullable(); // S&K diubah menjadi sk karena nama kolom tidak bisa mengandung karakter '&'
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('kontent');
}
};