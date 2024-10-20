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
    <!-- slider section -->



    <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          {{ $product->name }}
        </h2>
      </div>
      <div class="row" style="">
    <div class="col-md-10" style="margin: 0 auto">
    <div class="box">
        <div class="img-box">
          <img src="/storage/{{ $product->image }}" alt="">
        </div>
        <div class="detail-box mb-3">
          <h6>
            {{ $product->name }}
          </h6>
          <h6>
            Price
            <span>
              ${{ $product->price}}
            </span>
          </h6>
        </div>
        <div class="detail-box mb-3">
          <h6>
            {{ $product->category }}
          </h6>
          <h6>
            Stock
            <span>
              {{ $product->quantity}}
            </span>
          </h6>
        </div>
        <div class="detail-box mb-3">
          <p>{{ $product->description }}</p>
        </h6>
        </div>
        
    </div>
  </div>
</div>
</div>
</section>


    </div>


  </div>






   

  <!-- info section -->

  @include('home/footer')
  
</body>

</html>