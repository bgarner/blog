@extends('template/bloglayout')

@section('author')
Vincent the Dog
@stop

@section('description')
The Blog of Vincent the Dog
@stop

@section('title')
The Blog of Vincent the Dog
@stop

@section('content')

<?php $i = 0; ?>
@foreach($posts as $p)
	<?php $i++; ?>

	@if($i == 1)
	<div class="blog-post">
		<h2 class="blog-post-title"><a href="/read/{{ $p->id }}">{{ $p->title }}</a></h2>
		<p class="blog-post-meta">{{ $p->updated_at }} by <a href="/authors/{{ $p->author }}">{{ User::getRealName($p->author) }}</a></p>
		{{ $p->content }}

		<br /><br />
		<h3>{{ Comment::getCommentCount( $p->id ) }} comments  <small><a href="/read/{{ $p->id }}#comments">&raquo; View Comments</a></small></h3>

	</div><!-- /.blog-post -->

	<h1>More Posts</h1>
	@else
		{{ $p->updated_at }} : <a href="/read/{{$p->id}}">{{$p->title}} by {{ User::getRealName($p->author) }}</a><br />
	@endif

@endforeach



@stop
