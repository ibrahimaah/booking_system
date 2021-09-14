<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('floor_id')->constrained()->onDelete('cascade');
            $table->string('number')->unique()->comment('رقم الكلاس');
            $table->string('type')->comment('نوع الكلاس');
            $table->string('capacity')->nullable()->comment('سعة الكلاس');
            $table->string('note')->nullable()->comment('ملاحظات تخص الكلاس');
        });

        DB::table('rooms')->insert([

            ['floor_id' => 1 ,'number' => '0.600','type'=>'Small Hall', 'capacity'=>'40 Chair'],
            ['floor_id' => 1 ,'number' => '0.601','type'=>'Small Hall', 'capacity'=>'40 Chair'],
            ['floor_id' => 1 ,'number' => '0.400','type'=>'Small Hall', 'capacity'=>'40 Chair'],
            ['floor_id' => 1 ,'number' => '0.401','type'=>'Small Hall', 'capacity'=>'40 Chair'],
            ['floor_id' => 1 ,'number' => '0.200','type'=>'Small Hall', 'capacity'=>'40 Chair'],

            ['floor_id' => 2 ,'number' => '1.600','type'=>'Small Hall', 'capacity'=>'40 Chair'],
            ['floor_id' => 2 ,'number' => '1.601','type'=>'Small Hall', 'capacity'=>'40 Chair'],
            ['floor_id' => 2 ,'number' => '1.400','type'=>'Small Hall', 'capacity'=>'40 Chair'],
            ['floor_id' => 2 ,'number' => '1.401','type'=>'Small Hall', 'capacity'=>'40 Chair'],
            ['floor_id' => 2 ,'number' => '1.204','type'=>'معمل قسم النظم', 'capacity'=>'36 PC'],

            ['floor_id' => 3 ,'number' => '2.600','type'=>'Small Hall', 'capacity'=>'40 Chair'],
            ['floor_id' => 3 ,'number' => '2.601','type'=>'Small Hall', 'capacity'=>'40 Chair'],
            ['floor_id' => 3 ,'number' => '2.400','type'=>'Small Hall', 'capacity'=>'40 Chair'],
            ['floor_id' => 3 ,'number' => '2.401','type'=>'Small Hall', 'capacity'=>'40 Chair'],
            ['floor_id' => 3 ,'number' => '2.206','type'=>'Big Hall', 'capacity'=>'70 Chair'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
