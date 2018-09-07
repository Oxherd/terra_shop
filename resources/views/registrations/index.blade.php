<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <h1>Register</h1>
        <a href="/">Back</a>
        <form action="/register" method="POST">
            {{ csrf_field() }}
            <input type="text" name="name" placeholder="name" required />
            <input type="email" name="email" placeholder="email" required />
            <input type="password" name="password" placeholder="password" required />
            <input type="password" name="password_confirmation" placeholder="password confirmation" required/>
            <input type="submit" value="Submit"/>
        </form>
    </body>
</html>