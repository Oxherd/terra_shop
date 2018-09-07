<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <a href='/'>Index Categories</a> > <a>Index Tags</a>
        <h1>All Tags - ({{ count($tags) }}) tags</h1>
        <a href='/'>Back</a>
        
        <ul>
            @foreach($tags as $tag)
                <li><a href="/tags/{{ $tag->name }}">{{ $tag->name }}</a></li>
            @endforeach
        </ul>
    </body>
</html>