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
    <h2 class="blog-post-title">{{ $post->title}}</h2>
    <p class="blog-post-meta">{{ $post->updated_at }} by <a href="/author/{{ $author->id }}">{{ $author->first_name}} {{ $author->last_name }}</a></p>
    <hr />

    {{ $post->content }}

    <hr />
    <h3><a name="comments"></a>Comments</h3>

    <div id="commentcontainer">
        @if( count($comments) > 0)
            @foreach($comments as $c)
            <div><small>At {{ $c->updated_at }} <em><strong>{{ User::getUsername($c->author) }}</strong></em> said:</small><br />
                {{ $c->comment }}
            </div>
            <br />
            @endforeach
        @else
            <p>No comments yet</p>
        @endif
    </div>

    <hr />
    <div id="comment-area">
        <h3>Post Your Comment</h3>
        @if(Auth::user())
            @include('template/commentform')
        @else
            <a href="/login">Login</a>
        @endif
    </div>
</div><!-- /.blog-post -->

@stop
