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
            // Change 'date_of_invoice' to string
            $table->string('date_of_invoice')->change();

            // Add 'due_date' after 'date_of_invoice'
            $table->string('due_date')->after('date_of_invoice');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Revert 'date_of_invoice' to date
            $table->date('date_of_invoice')->change();

            // Drop the 'due_date' column
            $table->dropColumn('due_date');
        });
    }
};
