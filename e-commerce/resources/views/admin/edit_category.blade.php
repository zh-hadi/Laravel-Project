<!DOCTYPE html>
<html>
  <head> 
    @include('admin/css')

    <style>
      .category{
        display: flex;
        margin: auto;
      }
      .category h2{
        margin-right: 50px;
      }
      .category div {
        flex: 3;
        text-align: center;
      }
      .category div form input{
        padding: 5px;
      }
      .category div form button {
        padding: 5px 20px;
        font-weight: bold;
        border: 1px solid blueviolet;
      }

      table{
        border: 2px solid yellowgreen;
        width: 50%;
        margin: auto;
        text-align: center;
        margin-top: 50px;
      }
      table tr th{
        font-weight: bold;
        color: yellowgreen;
        size: 30px;
      }
      table tr:not(:last-child){
        border-bottom: 2px solid white;
      }
      table tr td{
        padding: 5px;
      }
    </style>
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
        
            <div class="category">
              <h2 >Update Category</h2>
  
              <div>
                <form action="{{ route('category_update', ['category' => $category->id ]) }}"  method="post">
                  @csrf
                  @method('patch')
                  <input type="text" name="category" value="{{ $category->category }}" id="category">
                  <button>Update</button>
                </form>
              </div>
            </div>

        </div>
 
        
          


    <!-- JavaScript files-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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