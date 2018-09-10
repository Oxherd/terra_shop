<div class="item">
    
    <a href="/items/{{ $item->name }}">
        <div class="picContainer">
            <img src="{{ $item->picture }}"></img>
        </div>
    </a>
    
    <a href="/items/{{ $item->name }}">
        <div class="group">
            <h3 class="name">{{ $item->name }}</h3>
            <p class="price">{{ $item->price }}</p>
            <p class="discount">30%</p>
            <hr>
            <p class="description">{{ substr($item->description, 0, 50) }}...</p>
        </div>
    </a>
    
    
    @if(Auth::check() && Auth::user()->is_admin)
    
        <form class="delete" action="/items/{{ $item->name }}" method="POST">
            {{ csrf_field() }}{{ method_field('delete') }}
            <button><i class="fas fa-times"></i></button>
        </form>
    
    @endif
</div>
