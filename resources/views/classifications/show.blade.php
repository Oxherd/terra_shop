<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <a href="/">Index Categories</a> > <a href="/categories/{{ $classification->category->name }}">Show Category</a> > <a>Show Classification</a>
        <h1>{{ ucfirst($classification->name) }} related Items</h1>
        <a href="/categories/{{ $classification->category->name }}">Back</a>
        
        <ul>
            @foreach($classification->items as $item)
                <li><a href="/items/{{ $item->name }}">{{ $item->name }}</a></li>
            @endforeach
        </ul>
    </body>
</html>