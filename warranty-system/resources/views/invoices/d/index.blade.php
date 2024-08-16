<x:layout>

<div class="container">
    <div class="row">
        
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
												<th>Author By</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($invoices as $invoice)
                                            <tr>
                                                <td>
                                                    <a href="{{route('invoicesd.show', ['invoicesd' => $invoice->id]) }}">
                                                    {{ $invoice->id }}
                                                    </a>
                                                </td>
												<td>{{ $invoice->created_at->format('d-M-Y') }}</td>
												<td>{{$invoice->user->name }}</td>
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