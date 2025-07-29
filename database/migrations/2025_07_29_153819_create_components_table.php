<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Bike;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(model: Bike::class);
            $table->string('type');
            $table->string('brand');
            $table->string('model');
            $table->string('serial_number');
            $table->float('lifespan_km'); // Planned KM
            $table->float('added_at_km'); // When added on your bike
            $table->float('price'); // probably interested in this?
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};
