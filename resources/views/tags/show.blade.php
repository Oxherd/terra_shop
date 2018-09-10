@extends('partials.main')

@section('content')

<div class="container tag_list">
    <h3 class="title">{{ $tag->name }}:</h3>
    
    <div class="menu">
        @foreach($tag->items as $item)
            @include('partials.item', ['item'])
        @endforeach
    </div>
</div>

@endsection