<x:layout>
    <div class="container">
        <div class="row">
            <a href="{{route("invoices.edit", ['invoice' => $invoice->id])}}">Edit Invoice</a>
        </div>
        <div class="row bg-color-light-scale-1">
            

                <div class="col-6 float-start">
                        <div class="mb-2">
                            <div style="font-weight: bold">Customer Name# </div>
                            <div>{{$customer->name }} </div>
                        </div>
                       <div class="mb-2">
                            <div style="font-weight: bold">Address#</div> 
                            <div>{{ $customer->address }} </div>
                       </div> 
                   
                        <div class="mb-2">
                            <div style="font-weight: bold">Phone# </div>
                            <div> </div>
                        </div>
                </div>
                <div class="col-6 text-right ">
                    <div class="mb-2">Invoice#<br>334345</div>
                    <div class="mb-2">Recevie Date# <div>{{$invoice->created_at->format('d-m-y')}}</div> </div>
                    <div class="mb-2">Deliery Date# <div>{{$invoice->created_at->addDays(7)->format('d-m-y')}}</div></div>
                </div>
            
        </div>
    </div>
    <div class="container">
        <div class="row">
        <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Serail</th>
                                <th>Problem</th>
                                <th>Sale Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->serial }}</td>
                                    <td>{{ $product->problem }}</td>
                                    <td>{{ $product->sale_date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

</x:layout>