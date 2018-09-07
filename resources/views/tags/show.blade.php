<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <a href='/'>Index Categories</a> > <a href="/tags">Index Tags</a> > <a>Show Tag</a>
        <h1>{{ $tag->name }} related {{ count($tag->items) }} Item</h1>
        <a href="/tags">Back</a>
        
        <ul>
            @foreach($tag->items as $item)
                <li><a href="/items/{{ $item->name }}">{{ $item->name }}</a></li>
            @endforeach
        </ul>
    </body>
</html>