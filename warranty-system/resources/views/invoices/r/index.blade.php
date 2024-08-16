<x:layout>


<div class="container">
    <div class="row">
        <div class="col-lg-3 ">
            <aside class="sidebar bg-color-light-scale-1">
                
                <h5 class="font-weight-bold pt-3 text-center">Opartion</h5>
                <ul class="nav nav-list flex-column">
                    <li class="nav-item"><a class="nav-link" href="{{route('invoices.index')}}">Receive Invoice</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('invoicesd.index') }}">Delivery Invoice</a></li>
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
					
									<h2 class="card-title">Invoices list</h2>
								</header>
								<div class="card-body">
									<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
										<thead>
											<tr>
												<th>Invoice ID</th>
												<th>Created At</th>
												<th>Author</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($invoices as $invoice)
                                            <tr>
                                                <td>
                                                    <a href="{{route('invoices.show', ['invoice' => $invoice->id]) }}">
                                                    {{ $invoice->id }}
                                                    </a>
                                                </td>
												<td>{{ $invoice->created_at->format('d-M-Y') }}</td>
												<td>{{ $invoice->user->name }}</td>
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