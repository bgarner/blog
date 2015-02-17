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
    <h2 class="blog-post-title">Our Authors</h2>
    <hr />
    <!-- <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p> -->

    @foreach($authorList as $a)

        <h3><a href="/author/{{$a->id}}">{{ $a->first_name }} {{ $a->last_name}}</a></h3>

    @endforeach


</div><!-- /.blog-post -->

@stop
