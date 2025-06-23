<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable();
            $table->string('visa_formalities');
            $table->datetime('flight_arrival_date')->nullable();
            $table->datetime('flight_departure_date')->nullable();
            $table->string('flight_airline')->nullable();
            $table->string('flight_number')->nullable();

            $table->string('food_preferences');
            $table->text('food_allergies')->nullable();
            $table->string('hotel_booking_status')->nullable();

            $table->string('tshirt_size')->nullable();
            $table->string('jacket_size')->nullable();
            $table->string('cultural_dress_size')->nullable();

            $table->decimal('weight_kg', 8, 2)->nullable();

            $table->boolean('breakfast')->default(false);
            $table->decimal('total_amount', 10, 2)->nullable();

            $table->string('payment_status')->nullable();

            $table->nullableTimestamps();
        });

        Schema::create('companions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->constrained('registrations')->onDelete('cascade');

            $table->string('first_name');
            $table->string('last_name');

            $table->string('food_preferences');
            $table->text('food_allergies')->nullable();
            $table->string('hotel_booking_status')->nullable();

            $table->string('tshirt_size')->nullable();
            $table->string('jacket_size')->nullable();
            $table->string('cultural_dress_size')->nullable();

            $table->decimal('weight_kg', 8, 2)->nullable()->unsigned();

            $table->boolean('breakfast')->default(false);
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companions');
        Schema::dropIfExists('registrations');
    }
};
