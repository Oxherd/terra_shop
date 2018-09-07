<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <a>Index Categories</a>
        <h1>All Categories</h1>
        @if(Auth::check())
            <p>Welcome, {{ Auth::user()->name }}</p>
            <a href="/logout">Logout</a>
        @else
            <a href="/register">Register</a>
            <form action="/login" method="POST">
                {{ csrf_field() }}
                <h3>Login</h3>
                <input type="email" name="email"/>
                <input type="password" name="password"/>
                <input type="submit" value="Submit"/>
            </form>
        @endif
        
        <hr>
        <a href='/classifications'>All Classificatioins</a> | <a href="/items">All Items</a> | <a href="/tags">All Tags</a>
        @if(Auth::check() && Auth::user()->is_admin)
            | <a href="/admin">All Admins</a>
        @endif
        <ul>
            @foreach($categories as $category)
                <li>
                    <a href="/categories/{{ $category->name }}" data-show="true">
                        <strong>{{ $category->id }} - {{ ucfirst($category->name) }}</strong>
                    </a>
                    <form action="/categories/{{ $category->name }}" method="POST" style="display: none;">
                        {{ csrf_field() }} {{ method_field('PUT') }}
                        <input type="text" name="name" value="{{ $category->name }}"/>
                        <input type="submit" value="Submit"/>
                    </form>
                    @if(Auth::check() && Auth::user()->is_admin)
                    | 
                    <a href="/categories/{{ $category->name }}/delete">Delete</a> | 
                    <button onclick="toggleForm(this)">Update</button>
                    @endif
                </li>
            @endforeach
        </ul>
        <form action="/categories" method="POST">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            {{ csrf_field() }}
            <input type="text" name="name" required/>
            <input type="submit" value="Submit"/>
        </form>
    </body>
    
    <script>
        function toggleForm(element){
            var parent = element.parentElement;
            
            if(parent.children[0].dataset.show == "true"){
                element.innerText = "Cancel";
                parent.children[0].style.display = "none";
                parent.children[1].style.display = "inline-block";
                parent.children[0].dataset.show = "false";
            }else{
                element.innerText = "Update";
                parent.children[0].style.display = "inline";
                parent.children[1].style.display = "none";
                parent.children[0].dataset.show = "true";
            }
            
        }
    </script>
</html>