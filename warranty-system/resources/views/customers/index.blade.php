<x:layout>

<div class="container">
    <div class="row">
        <div class="col-lg-3 ">
            <aside class="sidebar bg-color-light-scale-1">
                
                <h5 class="font-weight-bold pt-3 text-center">Opartion</h5>
                <ul class="nav nav-list flex-column">
                    <li class="nav-item"><a class="nav-link" href="{{route('customers.index')}}">All Customers</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('customers.create') }}">Create Customer</a></li>
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
					
									<h2 class="card-title">All Customers list</h2>
								</header>
								<div class="card-body">
									<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
										<thead>
											<tr>
												<th>Id</th>
												<th>Name</th>
												<th>Address</th>
                                                <th>Action</th>
												
											</tr>
										</thead>
										<tbody>
                                            @foreach ($customers as $customer)
                                            <tr>
												<td>{{ $customer->id }}</td>
												<td>{{ $customer->name }}</td>
												<td>{{ $customer->address }}</td>
												<td>
                                                    <a href="{{route('customers.edit', ['customer' => $customer->id ])}}">
                                                        <button>Edit</button>
                                                    </a>
                                                    <a href="{{route('customers.show', ['customer' => $customer->id ])}}">
                                                        <button>View</button>
                                                    </a>
                                                </td>
											</tr>
                                            @endforeach
											<tr>
												<td>Trident</td>
												<td>Internet
													Explorer 4.0
												</td>
												<td>Win 95+</td>
												<td>
                                                    <a href="">
                                                        <button>Edit</button>
                                                    </a>
                                                    <a href="{{route('customers.show', ['customer' => $customer->id ])}}">
                                                        <button>View</button>
                                                    </a>
                                                </td>
											</tr>
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