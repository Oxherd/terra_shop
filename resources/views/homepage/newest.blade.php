<div class="container newest">
    @if(count($newestItems) >= 4)
        <h2 class="title">Newest:</h2>
        @foreach($newestItems as $item)
        
        @include('partials.item', ['item'])
        
        @endforeach
    @endif
</div>