<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <a href="/">Index Categories</a> > <a href="/categories/{{ $classification->category->name }}">Show Category</a> > <a href="/classifications/{{ $classification->name }}">Show Classification</a> > <a>Show Item</a>
        <h1>Item {{ $item->name }}</h1>
        <a href="/classifications/{{ $classification->name }}">Back</a>
        
        <ul>
            <li>{{ $item->name }}</li>
            <li>$ {{ $item->price }}</li>
            <li>{{ $item->description }}</li>
            <li>{{ $item->classification_id }}</li>
            <li>Tags: 
                @foreach($item->tags as $tag)
                    <a href="/tags/{{ $tag->name }}">{{ $tag->name }}</a> | 
                @endforeach
            </li>
        </ul>
    </body>
</html>