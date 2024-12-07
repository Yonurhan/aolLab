<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Booking extends Model
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('outlet');
            $table->dateTime('time');
            $table->integer('guests');
            $table->string('user');
            $table->timestamp();
        });
    }
}
