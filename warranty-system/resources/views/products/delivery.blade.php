<x:layout>

<div class="container">
    <div class="row">
        <div class="col-lg-3 ">
            <aside class="sidebar bg-color-light-scale-1">
                
                <h5 class="font-weight-bold pt-3 text-center">Opartion</h5>
                <ul class="nav nav-list flex-column">
                    <li class="nav-item "><a class="nav-link" href="{{route('products.index')}}">All Warranty</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('products.create') }}">Add Warranty</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('products.delivery') }}">Delivery</a></li>
                </ul>
                
            </aside>
        </div>
        <div class="col-lg-9">

                    <div class="row">
						<div class="col">
							<section class="card card-admin">
								<header class="card-header">
									<div class="card-actions">
										<a href="#" class="card-action card-action-toggle" data-card-toggle>hadi</a>
										<a href="#" class="card-action card-action-dismiss" data-card-dismiss>ha</a>
									</div>
					
									<h2 class="card-title">All Products list</h2>
								</header>
								<div class="card-body">
                                    <form action="{{route('products.deliveryAdd') }}" method="post">
                                        @csrf
                                        <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Product Name</th>
                                                    <th>Serial</th>
                                                    <th>Problem</th>
                                                    <th>Sale Date</th>
                                                    <th>Customer Name</th>
                                                    <th>Importer Name</th>
                                                    <th>Delivery</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $product->id }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->serial }}</td>
                                                    <td>{{ $product->problem }}</td>
                                                    <td>{{ $product->sale_date }}</td>
                                                    <td>{{ $product->customer->name }}</td>
                                                    <td>{{ $product->importer_id }}</td>
                                                    <td><input type="checkbox" name="delivery[]" value="{{$product->id}}"></td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-success float-right">Confirm Delivery</button>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
        </div>
    </div>
</div>              


</x:layout>