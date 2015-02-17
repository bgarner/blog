<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item" href="/">Home</a>
            <a class="blog-nav-item" href="/authors">Our Authors</a>
            <a class="blog-nav-item" href="/login">Login</a>

            <div class="pull-right" style="color: #fff;padding-top: 8px;">
                @if(Auth::user())
                Welcome, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!  <a href="/logout">Log Out</a>
                @endif
            </div>
        </nav>
        
    </div>
</div>
