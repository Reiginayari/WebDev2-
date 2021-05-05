<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
class CreateExhibitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exhibits', function (Blueprint $table) {
            $table->id();
            $table->timestamp('StartDate');
            $table->timestamp('EndDate')->nullable();
            $table->string('Theme', 100);
            $table->foreignId('TransactionID');
        });

        DB::table('exhibits')->insert(
            array(
                'id' => 1,
                'StartDate' => now(),
                'Theme' => 'Jungle Madness',
                'TransactionID' => 1
            )
        );
        DB::table('exhibits')->insert(
            array(
                'id' => 2,
                'StartDate' => now(),
                'Theme' => 'City Prison',
                'TransactionID' => 2
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exhibits');
    }
}
