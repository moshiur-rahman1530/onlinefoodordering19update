

			<div class="title-box">
				<h5 style="color:blue;">Categories</h5>
			</div>
			<ul class="list-group list-group-sidebar" >
				<li>
            @foreach(App\category::orderBy('name','asc')->where('parent_id',null)->get() as $parent)
            <a href="{{route('categories.show',$parent->id)}}" class="list-group-item
             @if(Route::is('categories.show'))
             @if($parent->id==$category->id)
             Active
              @endif
              @endif">
              <img src="{{asset('images/categories/'.$parent->image)}}" width='50'>
              {{$parent->name}}
            </a>
            @endforeach
				</li>
			</ul>
		<!-- 	<div class="title-box">
				<h5 style="color:blue;">Brands</h5>
			</div>
			<ul class="list-group list-group-sidebar">
				<li>
					 
                            @foreach(App\brand::orderBy('name','asc')->get() as $brand)
                             <a href="{{route('brands.show',$brand->id)}}" class="dropdown-item list-group-item-action 
                             @if(Route::is('brands.show'))
                             @if($brand->id==$brand->id)
                             Active
                             @endif
                             @endif
                                   ">
                             <img src="{{asset('images/brands/'.$brand->image)}}" width='50'>
                            {{$brand->name}}
                            </a>
 
                            @endforeach
                            
				</li>
				
			</ul> -->



