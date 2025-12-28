<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')
                ->constrained()
                // ->constrained('customers', 'id')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('service_id')
                ->constrained()
                // ->constrained('services', 'id')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamp('appointment_time');

            $table->enum('status', ['pending', 'confirmed', 'cancelled'])
                ->default('pending');

            $table->timestamps(); //created_at, updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appoitments');
    }
};
