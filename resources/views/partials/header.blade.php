<header>
            
    @include('partials.nav')
    
    <img src="https://images-3.gog.com/b34a334a6f4c621d71668c5483011a32bdef6c135e73dfa5f7a5c1c4517fee93.jpg"></img>
    
    <ul class="categories">
        @foreach($categories as $i => $category)
            <a href="/categories/{{ $category->name }}">
                <li class="{{ $select = $i == 0 ? 'select' : null }}">
                    {{ $category->name }}
                </li>
            </a>
        @endforeach
        
    </ul>
    
    @if(Auth::check() && Auth::user()->is_admin)
        <div class="container form">
            
            <p>Manage Categories:</p>
                    
            <div class="controlGroup">
                <button class="addCategory">New Category</button>
                <button class="renameCategory">Rename Category</button>
                <button class="deleteCategory">Delete Category</button>
            </div>
           
            <!--add category form-->
            <form action="/categories" method="POST" class="CRUDForm create">
                
                {{ csrf_field() }}
                
                <div class="group">
                    <input type="text" name="name" placeholder="Category's Name" required/>
                    <button type="submit" class="submit">Add</button>
                </div>
                
            </form>
            
            <!--rename category form-->
            <form class="CRUDForm update" action="/categories/{{ $categories->first()->name }}" method="POST">
                
                {{ csrf_field() }}{{ method_field('put') }}
                
                <div class="group">
                    <select>
                        @foreach($categories as $category)
                            <option value="/categories/{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    
                    <input type="text" name="name" placeholder="New Name" required/>
                    <button type="submit" class="submit">Rename</button>
                </div>
                
            </form>
            
            <!--delete category form-->
            <form class="CRUDForm destroy" action="/categories/{{ $categories->first()->name }}" method="POST">
                
                {{ csrf_field() }}{{ method_field('delete') }}
                
                <div class="group">
                    <select>
                        @foreach($categories as $category)
                            <option value="/categories/{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="submit">Delete</button>
                </div>
            </form>
        
        </div>
     @endif
</header>