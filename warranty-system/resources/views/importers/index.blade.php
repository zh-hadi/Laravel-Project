<x:layout>

<div class="container">
    <div class="row">
        <div class="col-lg-3 ">
            <aside class="sidebar bg-color-light-scale-1">
                
                <h5 class="font-weight-bold pt-3 text-center">Opartion</h5>
                <ul class="nav nav-list flex-column">
                    <li class="nav-item "><a class="nav-link" href="{{route('importers.index')}}">All Importers</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('importers.create') }}">Create Importer</a></li>
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
					
									<h2 class="card-title">All Importers list</h2>
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
                                            @foreach ($importers as $importer)
                                            <tr>
												<td>{{ $importer->id }}</td>
												<td>{{ $importer->name }}</td>
												<td>{{ $importer->address }}</td>
												<td>
                                                    <a href="{{route('importers.edit', ['importer' => $importer->id ])}}">
                                                        <button>Edit</button>
                                                    </a>
                                                    <a href="{{route('importers.show', ['importer' => $importer->id ])}}">
                                                        <button>View</button>
                                                    </a>
                                                </td>
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