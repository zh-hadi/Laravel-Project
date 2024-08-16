<x:layout>

<div class="container">

    <div class="row">
        <div class="col-lg-3 ">
            <aside class="sidebar bg-color-light-scale-1">
                
                <h5 class="font-weight-bold pt-3 text-center">Opartion</h5>
                <ul class="nav nav-list flex-column">
                    <li class="nav-item "><a class="nav-link" href="{{route('customers.index')}}">All Customers</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('customers.create') }}">Create Customer</a></li>
                </ul>
                
            </aside>
        </div>
        <div class="col-lg-9">

        <div class="container">
            <div>
                <h2>Customer information details</h2>
                <ul>
                    <li><span style="font-wieght: bold">Name: </span>{{$customer->name}}</li>
                    <li><span style="font-wieght: bold">Address: </span> {{$customer->address}}</li>
                </ul>
            </div>

            <div>
                <a href="{{route('customers.index')}}" class="btn btn-info">Back</a>
                <form action="{{route('customers.destroy', ['customer'=> $customer->id ])}}" method="post">
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