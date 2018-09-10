@extends('partials.main')

@section('content')
<div class="container">
    
    <div class="classification-1">
        @include('partials.sidebar')
    </div>
    
    <div class="classification-2">
        
        @if(count($category->classifications) > 0)
        
            @include('items.newItem')
            
            @foreach($category->classifications->first()->items as $item)
            
                @include('partials.item', ['item'])
                
            @endforeach
            
        @endif
    </div>

</div>
@endsection
