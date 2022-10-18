<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile" style="margin-top:100px">
              <a href="#" class="nav-link">
                
                <div class="text-wrapper">
                  <p class="profile-name">{{auth::user()->name}}</p>
                  <p class="designation">Premium user</p>
                </div>
              </a>
            </li>
            
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}">
      <span class="menu-title">Admin Dashboard</span></a>
    </li>
            
                     
               <div>     
            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#manage-products" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Manage Food Item</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="manage-products">
                <ul class="nav flex-column sub-menu">
                
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.products')}}">All Foods List </a>
                  
                  <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.product.create')}}">Add New</a>
                  </li>
                </ul>
              </div>
            </li>



            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#order-pages" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Manage Orders</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="order-pages">
                <ul class="nav flex-column sub-menu">
                
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.orders')}}">All Orders </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.sales')}}">Sales History</a>
                  </li>
                </ul>
              </div>
            </li>





          
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#category-pages" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Manage Category</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="category-pages">
                <ul class="nav flex-column sub-menu">
                
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.categories')}}"> All Category Lists </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.category.create')}}"> Add New Category </a>
                  </li>
                 
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#manage-brands" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Manage brands</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="manage-brands">
                <ul class="nav flex-column sub-menu">
                
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.brands')}}">All Brands List </a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.brand.create')}}">Add New Brands </a>
                  </li>
                </ul>
              </div>
            </li>


            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#manage-payments" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Manage payment Methods</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="manage-payments">
                <ul class="nav flex-column sub-menu">
                
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.payments')}}">All payment Options </a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.payment.create')}}">Add New payments </a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.payment.view_payment')}}">Online Payment</a>
                  </li>
                   <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.payment.view_cash')}}">Cash On</a>
                  </li>
                </ul>
              </div>
            </li>


            
                <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#manage-divisions" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Manage Area</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="manage-divisions">
                <ul class="nav flex-column sub-menu">
                
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.divisions')}}">All Area List </a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.division.create')}}">Add New Area </a>
                  </li>
                </ul>
              </div>
            </li>


            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#slider-pages" aria-expanded="false" aria-controls="general-pages"> <span class="menu-title">
            Manage Sliders</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="slider-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.sliders') }}">All Slider list</a></li>
              </ul>
            </div>
          </li>


            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#manage-users" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Manage users</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="manage-users">
                <ul class="nav flex-column sub-menu">
                
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.manage_users')}}">All Users List</a>
                  </li>
                </ul>
              </div>
            </li>


            
            <li class="nav-item">
              <a class="nav-link" href="">
               <form class="form-inline" action="{{route('admin.logout')}}" method="post">
                 @csrf
                 <input type="submit" value="Logout" class="btn btn-danger">
               </form>
              </a>
            </li>

 </div>
          </ul>
          
        </nav>
       