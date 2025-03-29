<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

use App\Models\Customer;
use Illuminate\Support\Facades\Storage;

use App\Services\InvoiceService;
use Illuminate\Support\Facades\Log;


class InvoiceController extends Controller
{
    protected $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function index()
    {   
        $invoices = Invoice::all();
        return view('admin.invoices.index', compact('invoices'));
    }

    public function create()
    {
        $invoiceNumber = $this->invoiceService->generateInvoiceNumber();
        $customers = Customer::select('id', 'name', 'phone_no1')->get();

        #Log::debug('invoiceNumber = '. print_r($customers,1));
        return view('admin.invoices.create',compact('invoiceNumber', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            //'invoice_number' => 'required|unique:invoices',
            'customer_name' => 'required',
            //'address' => 'required',
            'phone' => 'required',
            //'date_of_invoice' => 'required|date',
            'total_amount' => 'required',
            'grand_total' => 'required',
            //'invoice_media' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        //Log::debug('request = '. print_r($request,1));

        /*Invoice::create([
            'invoice_number' => $request->invoice_number,
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'date_of_invoice' => $request->date_of_invoice,
            'invoice' => $request->invoice,
            'invoice_status' => 1,
            'total_amount' => $request->total_amount,
            'grand_total' => $request->grand_total
        ]);

        $request->total_amount = str_replace(['₹', ',', ' '], '', $request->total_amount);
        $request->grand_total = str_replace(['₹', ',', ' '], '', $request->grand_total);*/


        //Log::debug('request = '. print_r($request,1));


        Invoice::create($request->all());

        return redirect()->route('admin.invoices.index')->with('success', 'Invoice created successfully!');
    }

    public function show($id)
    {
        $invoice = Invoice::where('id', decrypt($id))->first();

        $d_invoice = $invoice->invoice;
             
        return view('admin.invoices.show', compact('invoice', 'd_invoice'));
    }

    public function edit($id)
    {
        $data = Invoice::where('id', decrypt($id))->first();
        $customers = Customer::select('id', 'name', 'phone_no1')->get();

        //Log::debug($data);

        return view('admin.invoices.edit', compact('data', 'customers'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'customer_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'date_of_invoice' => 'required|date',
            'total_amount' => 'required|numeric',
            'grand_total' => 'required|numeric',
            'invoice_media' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('invoice_media')) {
            Storage::disk('public')->delete($invoice->invoice_media);
            $invoice->invoice_media = $request->file('invoice_media')->store('invoices', 'public');
        }

        $invoice->update($request->only(['customer_name', 'address', 'phone', 'date_of_invoice', 'total_amount', 'grand_total', 'invoice_media']));

        return redirect()->route('admin.invoices.index')->with('success', 'Invoice updated successfully!');
    }

    public function destroy(Invoice $invoice)
    {
        if ($invoice->invoice_media) {
            Storage::disk('public')->delete($invoice->invoice_media);
        }

        $invoice->delete();
        return redirect()->route('admin.invoices.index')->with('success', 'Invoice deleted successfully!');
    }
}
