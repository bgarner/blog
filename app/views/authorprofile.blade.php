@extends('template/bloglayout')

@section('author')
Vincent the Dog
@stop

@section('description')
The Blog of Vincent the Dog
@stop

@section('title')
Our Authors
@stop

@section('content')


<div class="blog-post">
    <h1 class="blog-post-title">{{$author->first_name}} {{$author->last_name}}</h1>
    <!-- <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p> -->
    <hr />
    <h2>Latest Posts</h2>
    @if( count($posts) > 0 )
        @foreach($posts as $p)

            <p><strong><a href="/read/{{$p->id}}">{{ $p->title }}</a></strong> - {{ $p->updated_at }}</p>

        @endforeach
    @else
        <p>No posts by this author yet.</p>
    @endif

    <br /><br />
    <h2>Latest Comments</h2>
    @if( count($comments) > 0 )
        @foreach($comments as $c)
            <?php $postwithcomment = BlogPost::getBlogPost( $c->post_id ); ?>
        <p><strong><a href="/read/{{$c->post_id}}">{{$postwithcomment->title}}</strong></a><br />&ldquo;{{ $c->comment }}&rdquo; <br /><small>on {{ $c->updated_at }}</small></p>
        <br />


        @endforeach
    @else
        <p>No comments by this author yet.</p>
    @endif

</div><!-- /.blog-post -->

@stop
