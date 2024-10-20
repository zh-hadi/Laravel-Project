<!DOCTYPE html>
<html>
  <head> 
    @include('admin/css')
  </head>
  <body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2>Order Process</h2>
        </div>
        </div>

        <div class="col-lg-12">
                <div class="block">
                  <div class="title"><strong>Striped table with hover effect</strong></div>
                  <div class="table-responsive"> 
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>User name</th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th>Product Title</th>
                          <th>Price</th>
                          <th>Image</th>
                          <th>Status</th>
                          <th>Action</th>
                          <th>Download</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->rec_address }}</td>
                                <td>{{ $order->product->name }}</td>
                                <td>{{ $order->product->price }}</td>
                                <td>  <img width="120" height="120" src="/storage/{{ $order->product->image }}" /></td>
                                <td>{{ $order->status }}</td>
                                <td class="d-flex flex-column"> 
                                    <a href="{{ route('orders.delivered', $order->id ) }}" class="btn btn-success">Delivery</a>
                                    <a href="{{ route('orders.cancel', $order->id )}}" class="btn btn-danger">Cancel</a>
                                </td>
                                <td>
                                    <a href="{{ route('orders.pdf', $order->id ) }}">View PDF</a>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


        
        </div>
    
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{ asset('admincss/js/front.js')}}"></script>
  </body>
</html>