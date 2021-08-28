<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('address2')->nullable();
            $table->string('postcode');
            $table->string('city');
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('businesses')->insert(
            array(
                'name' => 'GMFood',
                'address' => '43 Royal Crescent',
                'postcode' => 'BS8 4JS',
                'city' => 'Bristol',
                'website' => 'http://gmfood.webmarcello.co.uk/',
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
        Schema::dropIfExists('businesses');
    }
}
