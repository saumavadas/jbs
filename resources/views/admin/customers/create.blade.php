<x-admin>
    @section('title')
        {{ 'Create Customer' }}
    @endsection
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Customer</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.customers.index') }}" class="btn btn-info btn-sm">Back</a>
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
                    <form class="needs-validation" novalidate action="{{ route('admin.customers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                                            class="form-control" required>
                                            <x-error>name</x-error>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Phone No 1</label>
                                        <input type="text"  name="phone_no1" id="phone_no1" value="{{ old('phone_no1') }}"
                                            class="form-control" required>
                                            <x-error>phone_no1</x-error>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Phone No 2</label>
                                        <input type="text" name="phone_no2" id="phone_no2" value="{{ old('phone_no2') }}"
                                            class="form-control" >
                                            <x-error>phone_no1</x-error>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Address</label>
                                        <input type="text" name="address" id="address" value="{{ old('address') }}"
                                            class="form-control" >
                                            <x-error>address</x-error>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Date of Register</label>
                                        <input type="text" name="date_of_register" id="date_of_register" value="{{ old('date_of_register') }}"
                                            class="form-control" >
                                            <x-error>date_of_register</x-error>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        &nbsp;
                                    </div>
                                </div>



                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Deposit</label>
                                        <input type="text" name="deposit" id="deposit" value="{{ old('deposit') }}" placeholder="₹ 0.00"
                                            class="form-control rupee-input" >
                                            <x-error>address</x-error>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Due</label>
                                        <input type="text" name="due" id="due"  value="{{ old('due') }}" placeholder="₹ 0.00"
                                            class="form-control rupee-input" >
                                            <x-error>due</x-error>
                                    </div>
                                </div>



                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Notes</label>
                                        <textarea class="form-control" name="notes" id="notes" rows="3">{{ old('notes') }}</textarea>                                      
                                            <x-error>notes</x-error>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Files and Docs</label>
                                        <>                                      
                                            <x-error>notes</x-error>
                                    </div>
                                </div>


                            </div>
                        </div>


                        <iframe src="/laravel-filemanager" style="width: 100%; height: 500px; border: none;"></iframe>

    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
                        
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
        $('#phone_no1').inputmask('9999999999');
        $('#phone_no2').inputmask('9999999999');
        $('#date_of_register').inputmask('99/99/9999', { placeholder: 'MM/DD/YYYY' });

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
        })/*.on('complete', function()
        {
            console.log('Phone number is complete!');
        }).on('change', function()
        {
            
            //console.log('Input value changed:', $(this).val());

            let formattedValue1 = $(this).val();
            let cleanValue1 = formattedValue1.replace(/[^0-9.]/g, ''); // Remove ₹ and commas
            $('this').empty().val(cleanValue1); // Store cleaned value in hidden field

            console.log(cleanValue1 );

            console.log($('#due').val(cleanValue1) );

            
        });



        $('form').on('submit', function (e) 
        {
            e.preventDefault();

            /*let formattedValue1 = $('#due').val();
            let cleanValue1 = formattedValue1.replace(/[^0-9.]/g, ''); // Remove ₹ and commas
            $('#due').val(cleanValue1); // Store cleaned value in hidden field

            console.log(cleanValue1 );*/
        //});
        
    });
    </script>
    @endsection
</x-admin>
