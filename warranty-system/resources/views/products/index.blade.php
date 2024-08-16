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
										<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
										<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
									</div>
					
									<form action="{{route('products.index') }}" method="get">
                                        <select class="form-control mb-3" name="search_id">
                                            @foreach ($customers as $customer)
                                                <option value="{{$customer->id}}">{{ $customer->name }}  ({{ $customer->products_count}})</option>
                                            @endforeach
                                        </select> 
                                        <button type="submit">Filter</button>                                       
                                    </form>
								</header>
								<div class="card-body">
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
								
											</tr>
                                            @endforeach
											
										</tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>
        </div>
    </div>
</div>              


</x:layout>