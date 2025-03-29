<x-admin>
    @section('title','Customers')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Customer Table</h3>
            <div class="card-tools">
                <a href="{{ route('admin.customers.create') }}" class="btn btn-sm btn-info">New</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="objectTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone No1</th>
                        <th>Phone No2</th>
                        <th>Due</th>
                        <th>Deposit</th>
                        <th>Bill</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach ( $customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td> 
                        <td>{{ $customer->phone_no1 }}</td>
                        <td>{{ $customer->phone_no2 }}</td>
                        <td>{{ $customer->due }}</td>
                        <td>{{ $customer->deposit }}</td>
                        <td><a href="# {{--route('admin.customrs.edit', encrypt($product->id)) --}}" class="btn btn-sm btn-primary">View Bill</a></td>
                        <td><a href="# {{--route('admin.customrs.edit', encrypt($product->id)) --}}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="# {{--route('admin.customrs.edit', encrypt($product->id)) --}}" class="btn btn-sm btn-danger">Delete</a></td>       
                    </tr>
                @endforeach

                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
    @section('js')
        <script>
            $(function() {
                $('#objectTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>
