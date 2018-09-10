<div class="sidebar navigationForm">
   
    <h3>
        Classifications:
    </h3>
    
    @if(Auth::check() && Auth::user()->is_admin)
        <form class="create" action="/classifications" method="POST">
            {{ csrf_field() }}
            <input type="text" name="name" placeholder="New Classification" required/>
            <input type="hidden" value="{{ $category->id }}" name="category_id">
            <button type="submit">Add</button>
        </form>
        @endif
    
    @if(count($category->classifications) > 0)
    
        <ul>
            
            @foreach($category->classifications as $i => $classification)
                <li class="{{ $select = 'classifications/'.$classification->name == urldecode(request()->path()) || ($i == 0 && 'categories/'.$classification->category->name == urldecode(request()->path())) || (!empty($item) && in_array($item->name, $classification->items->pluck('name')->toArray())) ? 'select' : null }}">
                    <a href="/classifications/{{ $classification->name }}"><span>{{ ucfirst($classification->name) }}</span></a>
                    
                    <!--CRUD form-->
                    @if(Auth::check() && Auth::user()->is_admin)
                        <form class="group" action="/classifications/{{ $classification->name }}" method="POST">
                            
                            {{ csrf_field() }}{{ method_field('put') }}
                            
                            <input type="text" name="name" value="{{ $classification->name }}" required/>
                            <button><i class="fas fa-check check"></i></button>
                            <i class="fas fa-ban cancel"></i>
                        </form>
                        <i class="fas fa-pen rename"></i>
                        
                        <form class="delete" action="/classifications/{{ $classification->name }}" method="POST">
                            {{ csrf_field() }}{{ method_field('delete') }}
                            <button><i class="fas fa-times"></i></button>
                        </form>
                    @endif
                    
                </li>
            @endforeach
            </ul>
    
    @else
        <!--hint-->
        <h1>Oops, guess there is no content here...</h1>
    @endif
    
</div>

   