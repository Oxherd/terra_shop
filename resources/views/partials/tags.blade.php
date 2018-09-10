<div class="container navigationForm tags">
    <h3>Tags:</h3>
    
    @if(Auth::check() && Auth::user()->is_admin)
        <form class="create" action="/tags" method="POST">
            {{ csrf_field() }}
            <input type="text" name="name" placeholder="New Tag" required/>
            <button type="submit">Add</button>
        </form>
    @endif
    
    <ul>
        
        @foreach($tags as $tag)
        
            <li class="tag">
                <a href="/tags/{{ $tag->name }}"><span>{{ $tag->name }}</span></a>
                
                <!--CRUD form-->
                @if(Auth::check() && Auth::user()->is_admin)
                        <form class="group" action="/tags/{{ $tag->name }}" method="POST">
                            
                            {{ csrf_field() }}{{ method_field('put') }}
                            
                            <input type="text" name="name" value="{{ $tag->name }}" required/>
                            <button><i class="fas fa-check check"></i></button>
                            <i class="fas fa-ban cancel"></i>
                        </form>
                        <i class="fas fa-pen rename"></i>
                        
                        <form class="delete" action="/tags/{{ $tag->name }}" method="POST">
                            {{ csrf_field() }}{{ method_field('delete') }}
                            <button><i class="fas fa-times"></i></button>
                        </form>
                    @endif
    
            </li>
                
        @endforeach
        
    </ul>
    
</div>