@extends('partials.main')

@section('content')

        <div class="container">
                <div class="classification-1">
                        @include('partials.sidebar', ['category' => $classification->category])
                </div>
                <div class="classification-2 itemShow">
                        <div class="group">
                                <img src="{{ $item->picture }}"></img>
                                <h1>{{ $item->name }}</h1>
                                <hr>
                                <h3 class="price">{{ $item->price }}</h3>
                                <h3>{{ $item->description }}</h3>
                        </div>
                        
                        @include('partials.addCart', ['item'])
                        
                        <!--update form-->
                        @include('items.updateItem', ['item'])
                        
                        <!--tag list-->
                        
                        @foreach($item->tags as $tag)
                                <h3 class="tag">
                                        <a href="/tags/{{ $tag->name }}">{{ $tag->name }}</a>
                                        @if(Auth::check() && Auth::user()->is_admin)
                                                <form action="/items/{{ $item->name }}/{{ $tag->name }}" method="POST">
                                                        {{ csrf_field() }}{{ method_field('delete') }}
                                                        <button><i class="fas fa-times"></i></button>
                                                </form>
                                        @endif
                                </h3>
                        @endforeach
                        
                        
                        @if(Auth::check() && Auth::user()->is_admin)
                        
                                <!--add tag-->
                                <h3 class="tag">
                                        <form class="add" action="/items/" method="POST">
                                                {{ csrf_field() }}
                                                <button><i class="fas fa-plus"></i></button>
                                                <select>
                                                        <option disabled selected >Please Select One Tag</option>
                                                        @foreach($tags as $tag)
                                                                <option value="/items/{{ $item->name }}/{{ $tag->name }}">{{ $tag->name }}</option>
                                                        @endforeach
                                                </select>
                                        </form>
                                </h3>
                                
                                 <!--delete item-->
                                
                                <form class="delete" action="/items/{{ $item->name }}" method="POST">
                                        {{ csrf_field() }}{{ method_field('delete') }}
                                        <button><i class="fas fa-times"></i></button>
                                </form>
                        @endif
                        
                        
                </div>
                
                <div class="classification-1"></div>
                
                <div class="classification-2">
                        @include('items.addComment', ['item'])
                </div>
                
        
        </div>

@endsection