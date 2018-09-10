@extends('partials.main')

@section('content')

<div class="container registration">
    <h3>Register:</h3>
    <form action="/register" method="POST">
        {{ csrf_field() }}
        
        <div class="container">
            <input type="text" name="name" placeholder="Name" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="password" name="password_confirmation" placeholder="Type Password Again" required />
        
            <button type="submit" class="submit">Submit</button>
        </div>
    </form>
</div>

@endsection