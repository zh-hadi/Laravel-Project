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
            <h2>Update Product</h2>
        </div>
        </div>


        <div class="col-lg-8">
                <div class="block">
                  <div class="title"><strong class="d-block">Horizontal Form</strong><span class="d-block">Lorem ipsum dolor sit amet consectetur.</span></div>
                  <div class="block-body">
                    <form action="{{ route('products.update', $product->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Name</label>
                        <div class="col-sm-9">
                          <input id="inputHorizontalSuccess" name="name" type="text" value="{{ $product->name }}" placeholder="Product name" class="form-control form-control-success">
                          @error('name')
                            <small class="form-text">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Description</label>
                        <div class="col-sm-9">
                          <textarea id="inputHorizontalSuccess" name="description" type="text" placeholder="description" class="form-control form-control-success">
                          {{ $product->description }}
                        </textarea>
                          @error('description')
                            <small class="form-text">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Price</label>
                        <div class="col-sm-9">
                          <input id="inputHorizontalSuccess" name="price" type="text" value="{{ $product->price }}" placeholder="price" class="form-control form-control-success">
                          @error('price')
                            <small class="form-text">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Quantity</label>
                        <div class="col-sm-9">
                          <input id="inputHorizontalSuccess" name="quantity" type="number" value="{{ $product->quantity }}" placeholder="Quantity" class="form-control form-control-success">
                          @error('quantity')
                            <small class="form-text">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Image</label>
                        <div class="col-sm-9">
                          <input id="inputHorizontalSuccess" name="image" type="file" placeholder="image.jpg" class="form-control form-control-success">
                          @error('image')
                            <small class="form-text">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Category</label>
                        <div class="col-sm-9">
                          <select id="inputHorizontalSuccess" name="category" type="file" placeholder="Product name" class="form-control form-control-success">
                            <option>Select</option>
                            <option value="student">Student</option>
                            <option value="etc">Farmer</option>
                            <option>Engineer</option>
                        </select>
                          @error('category')
                            <small class="form-text">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                      
                      <div class="form-group row">       
                        <div class="col-sm-9 offset-sm-3">
                          <input type="submit" value="Update Product" class="btn btn-primary">
                        </div>
                      </div>
                    </form>
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