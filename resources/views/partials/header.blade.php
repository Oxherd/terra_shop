<header class="navigationForm">
            
    @include('partials.nav')
    
    <img src="https://images-3.gog.com/b34a334a6f4c621d71668c5483011a32bdef6c135e73dfa5f7a5c1c4517fee93.jpg"></img>
    
    @if(Auth::check() && Auth::user()->is_admin)
        <form class="create" action="/categories" method="POST">
            {{ csrf_field() }}
            
            <div class="container">
                
                <input type="text" name="name" placeholder="New Category" required/>
                <button type="submit">Add</button>
                
            </div>
        </form>
        
        <form class="update" action="/categories" method="POST">
            {{ csrf_field() }}{{ method_field('put') }}
            
            <div class="container">
                
                <select class="select">
                    <option selected disabled>Select A Exist Catagory</option>
                    @foreach($categories as $category)
                        <option value="/categories/{{ $category->name }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                
                <input type="text" name="name" placeholder="New Name" required/>
                <button type="submit">Rename</button>
                
            </div>
        </form>
        @endif
    
    
    <ul class="categories">
        @foreach($categories as $category)
        
        
            
            <li class="{{ $select = 'categories/'.$category->name == urldecode(request()->path()) || (!empty($classification) && in_array($classification->name, $category->classifications->pluck('name')->toArray())) ? 'select' : null }}">
                <a href="/categories/{{ $category->name }}"><span>{{ ucfirst($category->name) }}</span></a>
                 
                 <!--CRUD form-->
                @if(Auth::check() && Auth::user()->is_admin)
                    
                    <form class="delete" action="/categories/{{ $category->name }}" method="POST">
                        {{ csrf_field() }}{{ method_field('delete') }}
                        <button><i class="fas fa-times"></i></button>
                    </form>
                    
                @endif
                    
                    
            </li>
            
        @endforeach
        
    </ul>
</header>