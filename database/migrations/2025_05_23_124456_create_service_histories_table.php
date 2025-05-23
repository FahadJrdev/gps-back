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
        Schema::disableForeignKeyConstraints();

        Schema::create('service_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained();
            $table->foreignId('technician_id')->constrained();
            $table->enum('service_type', ["installation","uninstallation","maintenance","inspection"]);
            $table->date('scheduled_date');
            $table->date('completion_date')->nullable();
            $table->text('observations');
            $table->enum('status', ["scheduled","in_progress","completed"]);
            $table->integer('kilometers')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_histories');
    }
};
