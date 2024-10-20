<!DOCTYPE html>
<html>

<head>
  @include('home/css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home/header')
    <!-- end header section -->


    <!-- end slider section -->
  </div>

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          My all Order Lists
        </h2>
      </div>
      <div class="row">

      <div class="col-lg-10">
                <div class="block">
                  
                  <div class="table-responsive"> 
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Product Name</th>
                          <th>Price</th>
                          <th>Image</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->product->name }}</td>
                                <td>{{ $order->product->price }}</td>
                                <td> <img src="/storage/{{ $order->product->price }}" width="120" height="120"/></td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


    </div>
    </div>
    </section>


  @include('home/footer')
  
</body>

</html>