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
              <h2 >Category List</h2>
  
              <div>
                <form action="{{ url('category_list') }}"  method="post">
                  @csrf
                  <input type="text" name="category" id="category">
                  <button>Create</button>
                </form>
              </div>
            </div>

            </div>
          </div>
            <table>
                <tr>
                  <th>Category</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              @foreach ($categorys as $category)
                <tr>
                  <td>{{$category->category }}</td>
                  <td><a href="{{ route('category_edit', ['category'=> $category->id] ) }}" class="btn btn-success">Edit</a></td>
                  <td>
                    <form action="{{ url('delete_catgory', ['category' => $category->id]) }}" method="post">
                      @csrf
                      @method('delete')
                      <button onClick="confirmation(event)" class="btn btn-danger">Delete</button>
                  </form>
                  </td>

                </tr>
              @endforeach
              
            </table>
        
        
    
 
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

    <script>
      function confirmation(e){
        e.preventDefault();

        const url = e.currentTarget.parentElement.getAttribute('action');

        swal({
          title: 'Are You Sure to Delete This',
          text: 'This Delete will be parmanent',
          icon: 'warning',
          buttons: true,
          dangerMode: true
        }).then((okToDelete)=>{
          if(okToDelete){
            window.location.href = url;
          }
        });
      }
    </script>
    <!-- <script>
      $(document).ready(function(){


        $(document).on('submit', '#submited', function(e){
          e.preventDefault();

          const url = $(this).attr('action');
          const formData = new FormData(this);

          $.ajax({
            type: "POST",
            url: url,
            data:formData,
            processData: false,
            contentType: false,
            success: function(response){
              console.log(response);
            }
          });
        });


      });
    </script> -->
  </body>
</html>