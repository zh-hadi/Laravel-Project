<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">

      @foreach ($products as $product)
      <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
         
              <div class="img-box">
                <img src="storage/{{ $product->image }}" alt="">
              </div>
              <div class="detail-box">
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
              <div>
                <a 
                  href="{{ route('product.show', ['product' => $product->id]) }}" 
                  class="btn btn-danger"
                >Details</a>
                <a href="{{ route('addCart', ['id' => $product->id ]) }}" class="btn btn-success">Add Card</a>
              </div>
           
          </div>
        </div>
      @endforeach

      </div>
     
    </div>
  </section>
