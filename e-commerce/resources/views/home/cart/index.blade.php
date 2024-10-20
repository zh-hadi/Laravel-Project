<!DOCTYPE html>
<html>

<head>
  @include('home/css')

  <style>
    table {
        border: 1px solid black;
        margin: 0 auto;
        margin-right: auto;
    }
    table thead tr {
      height: 50px;
    }
    table tr td, tr {
        padding: 10px;
        text-align: center;
    }
    table thead tr{
        background-color: black;
        color: white;
    }

    table tbody tr{
        border-bottom: 1px solid black;
    }


  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home/header')
    <!-- end header section -->

  </div>

  <section class="shop_section layout_padding">
    <div class="container d-flex flex-row-reverse">

        
       <div class="col-md-7  px-0 flex-2">
         <table class="col-12"  style="align-item: start;" >
             <thead>
                 <tr>
                     <th>Product Title</th>
                     <th> Price</th>
                     <th> Image</th>
                     <th> Remove</th>
                 </tr>
             </thead>
             <tbody>
                     @if($cart)
  
                  
                     
                     <?php $total = 0; ?>
                     
                     @foreach ($cart as $item)
                             <tr>
                                 <td>{{ $item->product->name }}</td>
                                 <td>{{ $item->product->price }}</td>
                                 <td><img width="100" height="100" src="/storage/{{ $item->product->image }}" alt=""></td>
                                 <td>
                                     <form action="{{route('cart.destroy', $item->id )}}" method="post">
                                         @csrf
                                         @method('delete')
                                         <button type="submit" class="btn btn-danger">Remove</button>
                                     </form>
                                 </td>
                             </tr>
                             <?php $total+=$item->product->price; ?>
                     @endforeach
                     @endif
             </tbody>
         </table>
    
         @if ($total)
         
         <div style="color: green; text-align: center">Your total cost is ${{ $total  }}</div>
         @endif
 
       </div>



    <div class="col-md-5 " style="display: flex; align-items: start;">
        <div class=" px-3">
          <form ="{{ route('cart.store') }}" method="post" style="display:flex; flex-direction: column; gap: 20px" >
            @csrf
            <div style="display: flex; flex-direction: column;">
              <label for="Name">Name</label>
              <input type="text" placeholder="Name" name="name" value="{{ $user->name }}"/>
            </div>
            
            <div style="display: flex; flex-direction: column;">
                <label for="">Phone number</label>
                <input type="text" placeholder="Phone" name="phone" value="{{ $user->phone }}" />
            </div>
            <div style="display: flex; flex-direction: column;">
                <label for="">Address</label>
                <textarea name="address" id="" cols="5" rows="10">
                {{ $user->address }}
                </textarea>
            </div>
            <div class="d-flex ">
              <button class="btn btn-primary">
                Cash On Delivery
              </button>
              <a href="{{ route('stripe.index', $total) }}" class="btn btn-success ml-2">Pay with Card</a>
            </div>
          </form>
        </div>
      </div>


    </div>
  
    </section>
 

  
  @include('home/footer')
  
</body>

</html>