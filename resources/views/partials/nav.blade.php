<nav>
    <div class="container">
        
        <div class="brand"><a href="/">Terra_Shop</a></div>
        
        @if(Auth::check())
            <div class="auth">
                <span class="user"><a href="/orders">{{ Auth::user()->name }}</a></span> | 
                <span class="logout"><a href="/logout">Logout</a></span>
            </div>
        @else
            <div class="auth">
                <span class="login">Login</span> or
                <span class="register"><a href="/register">Register</a></span>
            </div>
        @endif
        
    </div>
    
    <div class="loginPanel">
        <h3>Login</h3>
        <i>X</i>
        <form action="/login" method="POST">
            {{ csrf_field() }}
            
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
        
            <button type="submit" class="submit">Submit</button>
        </form>
    </div>
    
</nav>