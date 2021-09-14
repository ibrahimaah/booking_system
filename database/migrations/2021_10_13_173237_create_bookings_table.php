<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('المستخدم الذي قام بالحجز');
            $table->string('date')->comment('تاريخ الحجز');
            $table->string('time')->comment('وقت الحجز');
            $table->string('subject')->comment('اسم المادة التي تم حجز الكلاس من أجلها');
            $table->string('note')->comment('ملاحظات تخص الكلاس');
            $table->string('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
