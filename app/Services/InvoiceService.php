<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InvoiceService
{
    /**
     * Generate a new invoice number.
     *
     * @return string
     */
    public function generateInvoiceNumber(): string
    {
        // Step 1: Determine the financial year
        $currentDate = Carbon::now();
        $financialYear = $this->getFinancialYear($currentDate);

        // Step 2: Fetch the last invoice serial number for the current financial year
        $lastInvoice = DB::table('invoices')
            ->where('invoice_number', 'like', "INV-{$financialYear}-GTL-%")
            ->orderBy('id', 'desc')
            ->first();

        // Step 3: Extract the serial number and increment it
        $serialNumber = 1; // Default serial number
        if ($lastInvoice) {
            $lastInvoiceNumber = $lastInvoice->invoice_number;
            $lastSerialNumber = (int) substr($lastInvoiceNumber, -3); // Extract the last 3 digits
            $serialNumber = $lastSerialNumber + 1;
        }

        // Step 4: Generate the new invoice number
        $invoiceNumber = sprintf("INV-%s-GTL-%03d", $financialYear, $serialNumber);

        return $invoiceNumber;
    }

    /**
     * Get the financial year based on the given date.
     *
     * @param Carbon $date
     * @return string
     */
    private function getFinancialYear(Carbon $date): string
    {
        $year = $date->year;
        $month = $date->month;

        // Financial year starts from April 1 to March 31
        if ($month >= 4) {
            return $year . '-' . ($year + 1);
        } else {
            return ($year - 1) . '-' . $year;
        }
    }
}