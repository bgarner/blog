@include('template/header')
<body>

    @include('template/masthead')


    <div class="container">

        <div class="blog-header">
            <h1 class="blog-title">The Blog of Vincent the Dog</h1>
            <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
        </div>

        <div class="row">
            <div class="col-sm-8 blog-main">

                @yield('content')

            </div><!-- /.row -->

            @include('template/sidebar')

        </div><!-- /.container -->


@include('template/footer')
