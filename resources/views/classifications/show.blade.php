@extends('partials.main', ['classification'])




@section('content')
<div class="container">
    
    <div class="classification-1">
        @include('partials.sidebar', ['category' => $classification->category])
    </div>
    
    <div class="classification-2">
        
            @include('items.newItem')
        
            @foreach($classification->items as $item)
    
                @include('partials.item', ['item'])
                
            @endforeach
            
    </div>

</div>
@endsection
