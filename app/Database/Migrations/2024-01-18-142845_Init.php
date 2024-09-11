<?php

namespace App\Database\Migrations;

use App\Libraries\Eloquent;
use CodeIgniter\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

class Init extends Migration
{
    public function up()
    {
        Eloquent::schema()->create('pasien', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('address')->nullable();
            $table->string('phone', 64)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Eloquent::schema()->create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->text('desc');
            $table->timestamps();
            $table->softDeletes();
        });
        Eloquent::schema()->create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')
                ->constrained('pasien')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('code', 255)->nullable();
            $table->foreignId('room_id');
            $table->date('date_in');
            $table->date('date_out');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->string('name', 64);
            $table->text('address');
            $table->string('phone', 64);
            $table->text('kk');
            $table->text('ktp');
            $table->text('rujukan');
            $table->text('bpjs');
            $table->text('pasfoto');
            $table->text('sktm')->nullable();
            $table->unsignedInteger('status')->default(0);
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Eloquent::dropIfExists('pasien');
        Eloquent::dropIfExists('admin');
        Eloquent::dropIfExists('owner');
        Eloquent::dropIfExists('rooms');
        Eloquent::dropIfExists('bookings');
    }
}
