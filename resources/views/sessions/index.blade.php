@extends('partials.main')

@section('content')

<div class="loginPage container">
        <h3>Login:</h3>
        <form action="/login" method="POST">
            {{ csrf_field() }}
            <div class="container">
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
            
                <button type="submit" class="submit">Submit</button>
            </div>
        </form>
    </div>

@endsection