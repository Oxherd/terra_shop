<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <a href="/">Index Categories</a> > <a>Show Category</a>
        <h1>{{ ucfirst($category->name) }} related Classificatioins</h1>
        <a href="/categories">Back</a>
        <ul>
            @foreach($category->classifications as $classification)
            <li><a href="/classifications/{{ $classification->name }}"><strong>{{ ucfirst($classification->name) }}</strong></a></li>
            @endforeach
        </ul>
        
        <form action="/classifications" method="POST">
            {{ csrf_field() }}
            <input type="text" name="name"/>
            <input type="hidden" name="category_id" value="{{ $category->id }}" />
            <input type="submit" value="Submit"/>
        </form>
    </body>
</html>