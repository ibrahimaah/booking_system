<?php

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;

class CreateUsersTable extends Migration
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
            $table->string('name');
            // $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('is_student')->comment('check whether the user is student or instructor');
            $table->timestamps();
        });

         // Insert some stuff
         DB::table('users')->insert(
            array(
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$mA6FAUtSTn.VijWL9./G5.SYiR89dSblBSqPbkRM4FP4qI/XGeA4u',//123456789
                'is_student' => '-1' //-1 means that this user is an admin
            )
        );

        
        $role = Role::create(['name' => 'instructor']);
        $role = Role::create(['name' => 'student']);


        $user = User::where('email','admin@admin.com')->first();
        $role = Role::create(['name' => 'admin']);
        $user->assignRole($role);
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
}
