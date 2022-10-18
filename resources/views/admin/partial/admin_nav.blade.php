
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo">
            <img src="{{asset('images/brands/1574095727.png')}}" alt="logo" style="width:30%;" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block">Help : +8801934622580</li>
           
          </ul>
         <form class="ml-auto search-form d-none d-md-block" action="{{route('admin.search')}}" method="GET">
        
          <div class="input-group ">
         <input type="number" class="form-control" name="start_date" placeholder="from">
      
        <div class="input-group-append">
        <button class="btn btn-outline-warning" type="submit"><i class="fas fa-search"></i></button>
        </div>
     </div>
          </form> 
          <ul class="navbar-nav ml-auto">
         
 <li class="nav-item dropdown dropleft">
  
              <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-toggle="dropdown">
               <i class="fas fa-bell fa-lg text-danger"><span class="badge badge-danger">
           
                     {{ Auth::user()->unreadNotifications->count()}}
                   
           
        </span></i>
             
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
             <!--  <center><a href="{{route('markRead')}}">Mark all as Read</a></center> 
               -->
           
                 @foreach(Auth::user()->unreadNotifications as $item)
                <a style="background-color: lightgray" class="dropdown-item py-3 border-bottom"href="{{$item?url($item->data['link']):'#'}}">
                 {{$item->data['message']}}
                 {{$item->markAsRead()}}
                 
                </a>
                 @endforeach

                 
                
              
              </div>
       

            </li>



            <li class="nav-item dropdown">
              <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-email-outline">
                <span class="count bg-success">
                 {{App\sendMail::totalMessage()}}
                </span></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                @foreach(App\sendMail::messages() as $item)
               <a class="dropdown-item py-3 border-bottom" href="{{url('admin/contact/show/'.$item->id)}}">{{$item->name}}</a>
               @endforeach
              </div>
            </li>




            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              
                <a id="navbarDropdown" class="nav-link dropdown-toggle" 
                                href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                 <!--  <img class="img-md rounded-circle"src="{{asset('images/OCR0012_1_300x300.jpg')}}" alt="Profile image"> -->
                  <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                  <p class="font-weight-light text-muted mb-0">{{ Auth::user()->email }}</p>
                </div>
                <a class="dropdown-item" href="{{route('admin.profile')}}">My Profile <span class="badge badge-pill badge-danger"></span><i class="dropdown-item-icon ti-dashboard"></i></a>
                <a class="dropdown-item" href="{{ route('admin.index') }}">Admin Dashboard<i class="dropdown-item-icon ti-comment-alt"></i></a>
              
                            <div>
                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                    onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      {{ __('Sign Out') }}
                         </a>
                  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                      @csrf
                </form>
                        </div>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>