<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>
    <div class="sidebar-module">
        <h4>Authors</h4>
        <ol class="list-unstyled">
            <?php $authors = User::authorList(); ?>
            @foreach($authors as $a)
            <li><a href="/author/{{$a->id}}">{{$a->first_name}} {{$a->last_name}}</a></li>
            @endforeach
        </ol>
    </div>

</div><!-- /.blog-sidebar -->
