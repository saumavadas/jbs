<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the customer (required)
            $table->string('phone_no1'); // Phone no1 (required)
            $table->string('phone_no2')->nullable(); // Phone no2 (optional)
            $table->text('address')->nullable(); // Address (optional)
            $table->date('date_of_register'); // Date of register
            $table->string('media')->nullable(); // Media (optional)
            $table->text('notes')->nullable(); // Notes (optional)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};