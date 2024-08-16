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

        <div class="container">
            <div class="row">
                <div class="col">
                    <section class="card card-admin">
                        <header class="card-header">
                            <div class="card-actions">
                                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                            </div>
            
                            <h2 class="card-title text-center">Create a New Importers</h2>
                        </header>
                        <div class="card-body">
                            <form action="{{route('importers.store')}}" class="form-horizontal form-bordered" method="post">
                                @csrf
                                <div class="form-group row">
                                    @error('name')
                                    <small class="col-12 text-center text-danger float-right">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Name</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="name" class="form-control" id="inputDefault">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    @error('address')
                                        <small class="col-12 text-center text-danger float-right">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Address</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="address" class="form-control" id="inputDefault">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3"></div>
                                    <button class="btn btn-success col-lg-6 float-left" type="submit">Create Importer</button>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>


        </div>
    </div>
</div>              


</x:layout>