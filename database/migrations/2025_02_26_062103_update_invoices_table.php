<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->renameColumn('invoice_no', 'invoice_number');
            $table->text('invoice')->after('invoice_media');
            $table->tinyInteger('invoice_status')->after('invoice')->default(0);
        });
    }

    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->renameColumn('invoice_number', 'invoice_no');
            $table->dropColumn(['invoice', 'invoice_status']);
        });
    }
};
