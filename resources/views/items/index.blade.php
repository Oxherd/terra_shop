<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <a href='/'>Index Categories</a> > <a>Index Items</a>
        <h1>All Items - ({{ count($items) }}) items</h1>
        <a href='/'>Back</a>
        
        <form action="/items" method="POST">
            {{ csrf_field() }}
            <input type="text" name="name"/>
            <select name="classification_id">
                @foreach($classifications as $classfication)
                    <option value="{{ $classfication->id }}">{{ $classfication->name }}</option>
                @endforeach
            </select>
            <input type="number" name="price"/>
            <textarea name="description"></textarea>
            <input type="submit" value="Submit"/>
        </form>
        
        <ul>
            @foreach($items as $item)
                <hr>
                <li>
                    <ul>
                        <li>{{ $item->name }}</li>
                        <li>{{ $item->classification_id }}</li>
                        <li>{{ $item->price }}</li>
                        <li>{{ $item->description }}</li>
                        <li>Tags: 
                            @foreach($item->tags as $tag)
                                <a href="/tags/{{ $tag->name }}">{{ $tag->name }}</a> | 
                            @endforeach
                        </li>
                        <li><a href="/items/{{ $item->name }}/delete">Delete</a></li>
                    </ul>
                </li>
            @endforeach
        </ul>
    </body>
</html>