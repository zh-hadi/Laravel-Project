<x:layout>

<div class="container">

    <div class="row">
        <div class="col-lg-3 ">
            <aside class="sidebar bg-color-light-scale-1">
                
                <h5 class="font-weight-bold pt-3 text-center">Opartion</h5>
                <ul class="nav nav-list flex-column">
                    <li class="nav-item "><a class="nav-link" href="{{route('importers.index')}}">All Importers</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('importers.create') }}">Create Importers</a></li>
                </ul>
                
            </aside>
        </div>
        <div class="col-lg-9">

        <div class="container">
            <div>
                <h2>Importer information details</h2>
                <ul>
                    <li><span style="font-wieght: bold">Name: </span>{{$importer->name}}</li>
                    <li><span style="font-wieght: bold">Address: </span> {{$importer->address}}</li>
                </ul>
            </div>

            <div>
                <a href="{{route('importers.index')}}" class="btn btn-info">Back</a>
                <form action="{{route('importers.destroy', ['importer'=> $importer->id ])}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>


        </div>


        </div>
    </div>
</div>              


</x:layout>