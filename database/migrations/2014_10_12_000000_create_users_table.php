<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->boolean('admin')->default(0);
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        
        DB::table('users')->insert([
            'name' => 'admin',
            'admin' => true,
            'email' => 'admin@mail.com',
            'password' => Hash::make('password')
        ]);
        
        DB::table('users')->insert([
            'name' => 'Juan Karlos',
            'email' => 'juankarlos@gmail.com',
            'password' => Hash::make('password')
        ]);
        
        DB::table('users')->insert([
            'name' => 'Beyonce',
            'email' => 'beyonce@gmail.com',
            'password' => Hash::make('password')
        ]);
        
        DB::table('users')->insert([
            'name' => 'Billy Eyelash',
            'email' => 'blash@gmail.com',
            'password' => Hash::make('password')
        ]);
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
