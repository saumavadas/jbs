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
        Schema::table('invoices', function (Blueprint $table) {
            // Change 'total_amount' to string
            $table->string('total_amount')->change();

            // Change 'grand_total' to string
            $table->string('grand_total')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Revert 'total_amount' to decimal
            $table->decimal('total_amount', 10, 2)->change();

            // Revert 'grand_total' to decimal
            $table->decimal('grand_total', 10, 2)->change();
        });
    }
};
