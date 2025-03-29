<x-admin>
    @section('title')
        {{ 'Create Invoice' }}
    @endsection
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Invoice</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.invoices.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <form class="needs-validation" novalidate action="{{ route('admin.invoices.store') }}" method="POST" enctype="multipart/form-data" id="the-form">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="invoice_no" class="form-label">Invoice No</label>
                                        <input type="text" name="invoice_number" id="invoice_no" value="{{ $data->invoice_number }}"
                                            class="form-control" readonly>
                                            <x-error>invoice_no</x-error>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Select Customer</label>                                        
                                        <select name="selectCustomer" id="select-customer" class="form-control">
                                            <option value="">Select customer</option>
                                            @foreach($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }} : {{ $customer->phone_no1 }}</option>
                                            @endforeach
                                            <option value="" disabled>-----------------------------------</option>
                                            <option value="cash">Cash</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Customer Name</label>
                                        <input type="text" name="customer_name" id="customer_name" value="{{ $data->customer_name }}"
                                            class="form-control" required>
                                            <x-error>customer_name</x-error>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Phone no</label>
                                        <input type="text" name="phone" id="phone" value="{{ $data->phone }}"
                                            class="form-control" required>
                                            <x-error>phone</x-error>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label for="name" class="form-label">Order Date(Month)</label>
                                        <select name="invoice_banglaMonths" id="invoice_banglaMonths" class="form-control">
                                            <option value="">Select</option>    
                                            <option value="বৈশাখ">বৈশাখ</option>
                                            <option value="জ্যৈষ্ঠ">জ্যৈষ্ঠ</option>
                                            <option value="আষাঢ়">আষাঢ়</option>
                                            <option value="শ্রাবণ">শ্রাবণ</option>
                                            <option value="ভাদ্র">ভাদ্র</option>
                                            <option value="আশ্বিন">আশ্বিন</option>
                                            <option value="কার্তিক">কার্তিক</option>
                                            <option value="অগ্রহায়ণ">অগ্রহায়ণ</option>
                                            <option value="পৌষ">পৌষ</option>
                                            <option value="মাঘ">মাঘ</option>
                                            <option value="ফাল্গুন">ফাল্গুন</option>
                                            <option value="চৈত্র">চৈত্র</option>                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Days</label>
                                        <select name="invoice_banglaDays" id="invoice_banglaDays" class="form-control">
                                            <option value="">Select</option>    
                                            <option value="১">১</option> 
                                            <option value="২">২</option>
                                            <option value="৩">৩</option>
                                            <option value="৪">৪</option>
                                            <option value="৫">৫</option>
                                            <option value="৬">৬</option>
                                            <option value="৭">৭</option>
                                            <option value="৮">৮</option>
                                            <option value="৯">৯</option>
                                            <option value="১০">১০</option>
                                            <option value="১১">১১</option>
                                            <option value="১২">১২</option>
                                            <option value="১৩">১৩</option>
                                            <option value="১৪">১৪</option>
                                            <option value="১৫">১৫</option>
                                            <option value="১৬">১৬</option>
                                            <option value="১৭">১৭</option>
                                            <option value="১৮">১৮</option>
                                            <option value="১৯">১৯</option>
                                            <option value="২০">২০</option>
                                            <option value="২১">২১</option>
                                            <option value="২২">২২</option>
                                            <option value="২৩">২৩</option>
                                            <option value="২৪">২৪</option>
                                            <option value="২৫">২৫</option>
                                            <option value="২৬">২৬</option>
                                            <option value="২৭">২৭</option>
                                            <option value="২৮">২৮</option>
                                            <option value="২৯">২৯</option>
                                            <option value="৩০">৩০</option>
                                            <option value="৩১">৩১</option>
                                            <option value="৩২">৩২</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-1">
                                    <div class="form-group">
                                    <label for="name" class="form-label">Year</label>
                                        <select name="invoice_banglaYears" id="invoice_banglaYears" class="form-control">
                                            <option value="">Select</option>    
                                            <option value="১৪৩০">১৪৩০</option>
                                            <option value="১৪৩১">১৪৩১</option>   
                                            <option value="১৪৩২">১৪৩২</option>                                     
                                            <option value="১৪৩৩">১৪৩৩</option>
                                            <option value="১৪৩৪">১৪৩৪</option>
                                            <option value="১৪৩৫">১৪৩৫</option>
                                            <option value="১৪৩৬">১৪৩৬</option>
                                            <option value="১৪৩৭">১৪৩৭</option>
                                            <option value="১৪৩৮">১৪৩৮</option>
                                            <option value="১৪৩৯">১৪৩৯</option>
                                            <option value="১৪৪০">১৪৪০</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label for="name" class="form-label">Delivery Date(Month)</label>
                                        <select name="due_banglaMonths" id="due_banglaMonths" class="form-control">
                                            <option value="">Select</option>    
                                            <option value="বৈশাখ">বৈশাখ</option>
                                            <option value="জ্যৈষ্ঠ">জ্যৈষ্ঠ</option>
                                            <option value="আষাঢ়">আষাঢ়</option>
                                            <option value="শ্রাবণ">শ্রাবণ</option>
                                            <option value="ভাদ্র">ভাদ্র</option>
                                            <option value="আশ্বিন">আশ্বিন</option>
                                            <option value="কার্তিক">কার্তিক</option>
                                            <option value="অগ্রহায়ণ">অগ্রহায়ণ</option>
                                            <option value="পৌষ">পৌষ</option>
                                            <option value="মাঘ">মাঘ</option>
                                            <option value="ফাল্গুন">ফাল্গুন</option>
                                            <option value="চৈত্র">চৈত্র</option>                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Days</label>
                                        <select name="due_banglaDays" id="due_banglaDays" class="form-control">
                                            <option value="">Select</option>    
                                            <option value="১">১</option> 
                                            <option value="২">২</option>
                                            <option value="৩">৩</option>
                                            <option value="৪">৪</option>
                                            <option value="৫">৫</option>
                                            <option value="৬">৬</option>
                                            <option value="৭">৭</option>
                                            <option value="৮">৮</option>
                                            <option value="৯">৯</option>
                                            <option value="১০">১০</option>
                                            <option value="১১">১১</option>
                                            <option value="১২">১২</option>
                                            <option value="১৩">১৩</option>
                                            <option value="১৪">১৪</option>
                                            <option value="১৫">১৫</option>
                                            <option value="১৬">১৬</option>
                                            <option value="১৭">১৭</option>
                                            <option value="১৮">১৮</option>
                                            <option value="১৯">১৯</option>
                                            <option value="২০">২০</option>
                                            <option value="২১">২১</option>
                                            <option value="২২">২২</option>
                                            <option value="২৩">২৩</option>
                                            <option value="২৪">২৪</option>
                                            <option value="২৫">২৫</option>
                                            <option value="২৬">২৬</option>
                                            <option value="২৭">২৭</option>
                                            <option value="২৮">২৮</option>
                                            <option value="২৯">২৯</option>
                                            <option value="৩০">৩০</option>
                                            <option value="৩১">৩১</option>
                                            <option value="৩২">৩২</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-1">
                                    <div class="form-group">
                                    <label for="name" class="form-label">Year</label>
                                        <select name="due_banglaYears" id="due_banglaYears" class="form-control">
                                            <option value="">Select</option>    
                                            <option value="১৪৩০">১৪৩০</option>
                                            <option value="১৪৩১">১৪৩১</option>   
                                            <option value="১৪৩২">১৪৩২</option>                                     
                                            <option value="১৪৩৩">১৪৩৩</option>
                                            <option value="১৪৩৪">১৪৩৪</option>
                                            <option value="১৪৩৫">১৪৩৫</option>
                                            <option value="১৪৩৬">১৪৩৬</option>
                                            <option value="১৪৩৭">১৪৩৭</option>
                                            <option value="১৪৩৮">১৪৩৮</option>
                                            <option value="১৪৩৯">১৪৩৯</option>
                                            <option value="১৪৪০">১৪৪০</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Particulars(Description)</label>                                        
                                    </div>                                    
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="name" class="form-label">HSN/SAC Code</label>
                                    </div>                                    
                                </div>

                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Quantity</label>
                                        
                                    </div>                                    
                                </div>

                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Rate</label>
                                        
                                    </div>                                    
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Amount </label>
                                                                                                                               
                                    </div>                         
                                </div>

                                <div class="col-lg-1">
                                    <div class="form-group">
                                    <label for="name" class="form-label">&nbsp;</label>
                                        
                                    </div>                                    
                                </div>
                            </div>

                            



                <div id="dynamic-rows">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">                                        
                                        <input type="text" name="particulars[]" id="particulars0" value="{{ old('prticulars') }}"
                                            class="form-control particulars" required>
                                            <x-error>particulars</x-error>
                                    </div>                                    
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        
                                        <input type="text" name="sac_code[]" id="sac_Code0" value="{{ old('sac_Code') }}"
                                            class="form-control sac_Code" required>
                                            <x-error>sac_Code</x-error>
                                    </div>                                    
                                </div>

                                <div class="col-lg-1">
                                    <div class="form-group">
                                        
                                        <input type="text" name="qty[]" id="qty0" value="{{ old('qty') }}"
                                            class="form-control qty quantity" required>
                                            <x-error>Qty</x-error>
                                    </div>                                    
                                </div>

                                <div class="col-lg-1">
                                    <div class="form-group">
                                        
                                        <input type="text" name="rate[]" id="rate0" value="{{ old('rate') }}"
                                            class="form-control rate rupee-input" required>
                                            <x-error>Rate</x-error>
                                    </div>                                    
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        
                                        <input type="text" name="amount[]" id="amount0" value="{{ old('amount') }}"
                                            class="form-control amount rupee-input" required>
                                            <x-error>Amount</x-error>                                                                                        
                                    </div>                         
                                </div>

                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success add-row">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"></path>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"></path>
                                            </svg></button>
                                    </div>                                    
                                </div>
                            </div>

                            <div id="the-rows" style="border:0px solid red;">
                            </div>    
                </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="total_amount" class="form-label">Total Amount</label>
                                        <input type="text" name="total_amount" id="total" value="{{ old('total') }}"
                                            class="form-control rupee-input" required>
                                            <x-error>total_amount</x-error>
                                    </div>
                                </div>
                            </div>

                            <!--div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">GST = (CGST+SGST)</label>
                                    </div>
                                </div>
                            </div-->

                            <!--div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">                                        
                                        <input type="text" value="9%"
                                            class="form-control" required>
                                            
                                        
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">                                        
                                        <input type="text"  value="9%"
                                            class="form-control" required>
                                            
                                        
                                    </div>
                                </div>
                            </div-->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Grand Total Amount(GST = (CGST+SGST) 9%+9%=18%)</label>
                                        <input type="text" name="grand_total" id="grand_total" value="{{ old('grand_total') }}"
                                            class="form-control rupee-input" readonly>
                                            <x-error>grand_total</x-error>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Advenced Amount Paid</label>
                                        <input type="text" name="advanced_amount" id="advanced_amount" value="{{ old('advanced_amount') }}"
                                            class="form-control rupee-input">
                                            <x-error>advanced_amount</x-error>
                                    </div>
                                </div>
                            </div>

                        </div>

                        
                        <input type="hidden"  name="invoice" id="invoice" />
                        <input type="hidden"  name="address" id="address" value="address" />
                        <input type="hidden"  name="date_of_invoice" id="date_of_invoice" />
                        <input type="hidden"  name="due_date" id="due_date" />

                        <div class="card-footer">
                            <button type="submit" id="submit" class="btn btn-primary float-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('js')

    <script src="{{ asset('admin/plugins/jquery-inputmask/jquery.inputmask.js') }}"></script>
    <script>
    $(document).ready(function()
    {    
        let rowCount = 0;

        $('#phone').inputmask('9999999999');

        /*$('.quantity').inputmask('999');
        
        $('.rupee-input').inputmask(
        {
            alias: 'numeric',
            prefix: '₹ ',
            groupSeparator: ',',
            radixPoint: '.',
            autoGroup: true,
            digits: 2,
            rightAlign: true,
            allowMinus: false
        });*/
       

        $('#select-customer').change(function()
        {
            const namePhone = $(this).find(":selected").text().split(':');
            $('#customer_name').val(namePhone[0]);
            $('#phone').val(namePhone[1]);
        });

        $(document).on('click', '.add-row', function()
        {
            rowCount++;
            const newRow = `
                    <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        
                                        <input type="text" name="particulars" id="particulars${rowCount}" value="{{ old('particulars') }}"
                                            class="form-control particulars" required>
                                            <x-error>particulars</x-error>
                                    </div>                                    
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        
                                        <input type="text" name="sac_code" id="sac_code${rowCount}" value="{{ old('sac_code') }}"
                                            class="form-control sac_code" required>
                                            <x-error>sac_code</x-error>
                                    </div>                                    
                                </div>

                                <div class="col-lg-1">
                                    <div class="form-group">
                                        
                                        <input type="text" name="qty" id="qty${rowCount}" value="{{ old('qty') }}"
                                            class="form-control qty quantity" required>
                                            <x-error>Qty</x-error>
                                    </div>                                    
                                </div>

                                <div class="col-lg-1">
                                    <div class="form-group">
                                        
                                        <input type="text" name="rate" id="rate${rowCount}" value="{{ old('rate') }}"
                                            class="form-control rate rupee-input" required>
                                            <x-error>Rate</x-error>
                                    </div>                                    
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        
                                        <input type="text" name="amount" id="amount${rowCount}" value="{{ old('amount') }}"
                                            class="form-control amount rupee-input" required>
                                            <x-error>Amount</x-error>                                                                                        
                                    </div>                         
                                </div>

                                <div class="col-lg-1">
                                    <div class="form-group">
                                    
                                    <button type="button" class="btn btn-success add-row">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"></path>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"></path>
                                            </svg></button>
                                        
                                    <button type="button" class="btn btn-outline-danger del-row">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"></path>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"></path>
                                            </svg></button>

                                        
                                    </div>                                    
                                </div>
                            </div>
                `;

                $('#the-rows').append(newRow);
        });$(document).on('focus', '.phone-input', function() {
    $(this).inputmask('999-999-9999');
});

        $(document).on('click', '.del-row', function() 
        {
            $(this).closest('.row').remove();
        });

        function getRowData() 
        {
            const rowData = [];
            $('#dynamic-rows .row').each(function() 
            {
                const particulars = $(this).find('.particulars').val();
                const sacCode = $(this).find('.sac_code').val();
                const qty = $(this).find('.qty').val();
                const rate = $(this).find('.rate').val();
                const amount = $(this).find('.amount').val();

                // Push row data to the array
                rowData.push({
                    particulars,
                    sacCode,
                    qty,
                    rate,
                    amount
                });
            });

            return rowData;
        }

        $('#the-form').submit(function(e)
        {
            e.preventDefault();
            const rowData = JSON.stringify(getRowData());
            $('#invoice').val( rowData ) ;
           
            let date_of_invoice_val = $("#invoice_banglaMonths option:selected").text()+"-"+$("#invoice_banglaDays option:selected").text()+"-"+$("#invoice_banglaYears option:selected").text();
            $('#date_of_invoice').val(date_of_invoice_val);

            let due_date_val = $("#due_banglaMonths option:selected").text()+"-"+$("#due_banglaDays option:selected").text()+"-"+$("#due_banglaYears option:selected").text();
            $('#due_date').val(due_date_val);

            let total_amount = $('#total').val().replace(/[, ₹]/g, '');

            let advanced_amount = $('#advanced_amount').val().replace(/[, ₹]/g, '');
            //console.log(total_amount);

            if (!isNaN(total_amount)) 
            {
                let result = parseInt(total_amount)+(parseInt(total_amount) * 0.18);
                console.log(result);
                $('#grand_total').val( result );
            }     

            $(this).unbind('submit').submit();
        });
    });


$(document).on('focus', '.quantity', function() 
{
    $(this).inputmask('999');
});


$(document).on('focus', '.rupee-input', function() 
{
    $(this).inputmask(
    {
        alias: 'numeric',
        prefix: '₹ ',
        groupSeparator: ',',
        radixPoint: '.',
        autoGroup: true,
        digits: 2,
        rightAlign: true,
        allowMinus: false    
    });
});

    </script>
    @endsection
</x-admin>
