<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'customer_name',
        'address',
        'phone',
        'date_of_invoice',
        'due_date',
        'invoice',
        'invoice_status',
        'total_amount',
        'grand_total',
        'advenced_amount'
    ];
}
