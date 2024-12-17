<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportUnitsTable extends Migration
{
    public function up()
    {
        Schema::create('transport_units', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the transport unit
            $table->enum('type', ['trailer', 'truck']); // The type (trailer, truck)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transport_units');
    }
}
