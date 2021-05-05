<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('art', function (Blueprint $table) {
            $table->id();
            $table->string('ArtTitle', 50);
            $table->enum('ArtType', ['music', 'poetry']);
            $table->foreignId('userID');
        });

        DB::table('art')->insert(
            array(
                'id' => 1,
                'ArtTitle' => 'Sample Art #1',
                'ArtType' => 'music',
                'userID' => 1
            )
        );
        DB::table('art')->insert(
            array(
                'id' => 2,
                'ArtTitle' => 'Sample Art #2',
                'ArtType' => 'music',
                'userID' => 1
            )
        );
        DB::table('art')->insert(
            array(
                'id' => 3,
                'ArtTitle' => 'Sample Art #3',
                'ArtType' => 'music',
                'userID' => 1
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
        Schema::dropIfExists('art');
    }
}
