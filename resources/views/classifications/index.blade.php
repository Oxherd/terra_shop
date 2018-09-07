<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <a href="/">Index Categories</a> > <a>Index Classificatioins</a>
        <h1>All Classificatioins</h1>
        <a href="/">Back</a>
        
        <ul>
            @foreach($classifications as $classification)
                <li><a href="/"><strong>{{ $classification->id }} - {{ ucfirst($classification->name) }}</strong></a> | <a href="/classifications/{{ $classification->name }}/delete" onclick="confirmWarning(event)">Delete</a></li>
            @endforeach
        </ul>
        
        <form action="" method="POST">
            {{ csrf_field() }}
            <input type="text" name="name" required/>
            <select name="category_id" id="">
                @foreach($categories as $category)
                <option value='{{ $category->id }}'>{{ ucfirst($category->name) }}</option>
                @endforeach
            </select>
            <input type="submit" value="Submit"/>
        </form>
        
        <script>
            function confirmWarning(evt){
                var answer = confirm("Delete?");
                if(!answer){
                    evt.preventDefault();
                }
            }
        </script>
    </body>
</html>