<x:layout>

<div class="container">
    <form method="post" action="">
        @csrf
        @method('put')
        <div class="row">
                
            <!-- customer -->
            <div class="col-3 bg-color-light-scale-1 py-5">
                <label for="">Customer Name</label>
                <select class="form-control mb-3" name="customer_id">
                    @foreach ($customers as $customer)
                        <option value="{{$customer->id}}"
                        @if($customer->id == $current_customer_id)
                        selected
                        @endif
                         >{{ $customer->name }}</option>
                    @endforeach
                    
                    
                </select>
            </div>
            <!-- product info -->
            <div class="col-6">
                <!-- @if($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error }} </li>
                        @endforeach
                    </ul>
                @endif -->
                <div class="form-group row">
                    @error('name')
                    <small class="col-12 text-center text-danger float-right">
                        {{ $message }}
                    </small>
                    @enderror
                    <label class="col-lg-4 control-label text-lg-right pt-2" for="inputDefault">Product Name</label>
                    <div class="col-lg-7">
                        <input type="text" name="name"  class="form-control" id="inputDefault">
                    </div>
                </div>
                <div class="form-group row">
                    @error('serial')
                    <small class="col-12 text-center text-danger float-right">
                        {{ $message }}
                    </small>
                    @enderror
                    <label class="col-lg-4 control-label text-lg-right pt-2" for="inputDefault">Product Serail</label>
                    <div class="col-lg-7">
                        <input type="text" name="serial" class="form-control" id="inputDefault">
                    </div>
                </div>
                <div class="form-group row">
                    @error('problem')
                    <small class="col-12 text-center text-danger float-right">
                        {{ $message }}
                    </small>
                    @enderror
                    <label class="col-lg-4 control-label text-lg-right pt-2" for="inputDefault">Problem</label>
                    <div class="col-lg-7">
                        <input type="text" name="problem"  class="form-control" id="inputDefault">
                    </div>
                </div>
                <div class="form-group row">
                    @error('sale_date')
                    <small class="col-12 text-center text-danger float-right">
                        {{ $message }}
                    </small>
                    @enderror
                    <label class="col-lg-4 control-label text-lg-right pt-2" for="inputDefault">Sale Date</label>
                    <div class="col-lg-7">
                        <input type="text" name="sale_date"  class="form-control" id="inputDefault">
                    </div>
                </div>
            </div>
            <!-- importer -->
                <div class="col-3 bg-color-light-scale-1 py-5">
                    <label for="">Importer Name</label>
                    <select class="form-control mb-3" name="importer_id">
                        @foreach ($importers as $importer)
                            <option value="{{$importer->id}}"
                            
                            >{{ $importer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <Button class="btn btn-info col" type="submit">Update Product</Button>
            </div>
        </form>
</div>              

@if(isset($temp_products))
<div class="container">

    <div class="row">
        <div class="col">
    
        <section class="card card-admin">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
    
                    <h2 class="card-title">Product List</h2>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Serail</th>
                                <th>Problem</th>
                                <th>Sale Date</th>
                                <th>Customer ID</th>
                                <th>Importer ID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0; ?>
                            @foreach ($temp_products as $product)
                            <tr>
                                <td>{{++$count}}</td>
                                <td>{{ $product['name'] }}</td>
                                <td>{{ $product['serial'] }}</td>
                                <td>{{ $product['problem'] }}</td>
                                <td>{{ $product['sale_date'] }}</td>
                                <td>{{ $product['customer_id'] }}</td>
                                <td>{{ $product['importer_id'] }}</td>
                                <td>
                                    <a href="{{route("products.edit", ['product' => $count])}}">Edit</a>
                                    <a href="">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form method="post" action="{{route('products.storeData')}}">
                        @csrf
                        <button class="btn btn-success">Save Data</button>
                    </form>
                </div>
            </section>

    
    
        </div>
    </div>
</div>
@endif
</x:layout>