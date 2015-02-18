@extends('admin/template/adminlayout')

@section('title')
Admin Login
@stop

@section('content')

@include('admin/template/nav')

<div class="container" style="margin-top: 90px;">
    <h1>Edit Blog Post</h1>

    {{ Form::open(array('url' =>'/admin/post/edit')) }}
    <input type="hidden" name="post_id" id="post_id" value="{{ $blogpost->id }}">
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" id="blogposttitle" name="blogposttitle" placeholder="" value="{{ $blogpost->title }}">
    </div>

    <div class="form-group">
        <label>Blog Post</label>
        <textarea class="form-control" rows="10" id="blogpostcontent" name="blogpostcontent">{{ $blogpost->content }}</textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-success pull-right"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Publish</button>
    </div>

    {{ Form::close() }}


</div> <!-- /container -->

@stop
