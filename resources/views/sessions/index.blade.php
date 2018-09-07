<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <a href="/">Index Categories</a> > <a>Index Admins</a>
        <h1>All Admins</h1>
        <a href="/">Back</a>
        <ul>
            @foreach($admins as $admin)
            <hr>
            <li>
                <ul>
                    <li>{{ $admin->name }}</li>
                    <li>
                        <form action="/admin" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <input type="hidden" name="email" value="{{ $admin->email }}"/>
                            <input type="submit" value="Remove"/>
                        </form>
                    </li>
                </ul>
            </li>
            @endforeach
        </ul>
        <form action="/admin" method="POST">
            {{ csrf_field() }}
            <label for="newAdmin">New Admin</label>
            <input id="newAdmin" type="text" name="email"/>
            <input type="submit" value="Submit"/>
        </form>
        
    </body>
</html>