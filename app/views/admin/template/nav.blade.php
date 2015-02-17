<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Vincent's Blog</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/admin/posts">Posts</a></li>
                <li><a href="/admin/comments">Comments</a></li>
                <li><a href="/admin/users">Users</a></li>
            </ul>

            <div class="navbar-form pull-right" style="color: #fff;padding-top: 8px;">
            Welcome, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}! <a class="btn btn-success btn-xs" href="/admin/posts/new"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> New Post</a> <a class="btn btn-danger btn-xs" href="/logout"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Log Out</a>
            </div>
        </div><!--/.nav-collapse -->
    </div>
</nav>
