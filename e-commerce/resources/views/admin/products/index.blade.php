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
            <form action="{{ route('products.index')}}" method="get">
                <input type="text" name="search" placeholder="search...">
                <input type="submit" value="Search">
            </form>
          </div>
      </div>
        

            <div class="col-lg-10 mt-5">
                <div class="block margin-bottom-sm">
                  <div class="title"><strong>Striped Table</strong></div>
                  <div class="table-responsive"> 
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Product Name</th>
                          <th>Description</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Category</th>
                          <th>Image</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->category }}</td>
                                <td> <img  src="storage/{{ $product->image }}" alt="" height="120" width="120" srcset=""></td>
                                <td>
                                  <a href="{{ route('products.edit', $product->id ) }}" class="btn btn-secondery">Edit</a>
                                </td>
                                <td>
                                    <Button href="{{ route('products.destroy', ['product' => $product->id]) }}" i class="delete-btn btn btn-danger" >Delete</Button>
                                </td>
                            </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                    @isset($products->links)
                      {{ $products->links() }}
                    @endisset
                  </div>
                </div>
              </div>
      
        

      
         
        </div>
    
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{ asset('admincss/js/front.js')}}"></script>


    <script>

        $(document).ready(function(){
         
            $('.delete-btn').on('click',  function(ev){
             ev.preventDefault();

             toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }
     
     
             const url = $(this).attr('href');

             console.log(url);
     
             swal({
               title: 'Are you sure to delete this product',
               text: "This product deleted parmanently",
               icon: 'warning',
               buttons: true,
              }).then((ifok)=>{
                if(ifok){
                  $.ajax({
                      url: url,
                      type: 'DELETE',
                      data:{
                          "_token": "{{ csrf_token() }}",
                      },
                      success: function(res){
                        if(res){
                          toastr.success(res.message);
                          console.log(res);
                          setTimeout(()=> window.location.href = res.redirectUrl, 2000);
                          
                        }
                      }
                  });
                }
             });
            });
        });

    </script>
  </body>
</html>