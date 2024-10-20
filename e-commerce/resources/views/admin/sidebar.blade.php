<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{ asset('admincss/img/avatar-6.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="{{ request()->is('admin/dashboard') ? 'active' : ''}}"><a href="{{ url('admin/dashboard') }}"> <i class="icon-home"></i>Home </a></li>
                <li class="{{ request()->is('category_list') ? 'active' : ''}}"><a href="{{ url('category_list') }}"> <i class="icon-grid"></i>Category </a></li>
                
                
                <li class=" {{ request()->is('products*') ? 'active' : ''}}"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Products </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{ route('products.create') }}">Add Products</a></li>
                    <li><a href="{{ route('products.index') }}">View Products</a></li>
                   
                  </ul>
                </li>

                <li class="{{ request()->is('orders') ? 'active' : ''}}"><a href="{{ url('orders') }}"> <i class="icon-grid"></i>Orders </a></li>
               
        </ul>
        
      </nav>