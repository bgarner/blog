@extends('admin/template/adminlayout')

@section('title')
Admin Login
@stop

@section('content')

@include('admin/template/nav')

<div class="container" style="margin-top: 90px;">
    <h1>New Blog Post</h1>

    {{ Form::open(array('url' => '/admin/posts/new')) }}

    <input type="hidden" id="authorid" name="authorid" value="{{ Auth::user()->id }}">
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" id="blogposttitle" name="blogposttitle" placeholder="Blog Post Title">
    </div>

    <div class="form-group">
        <label>Blog Post</label>
        <textarea class="form-control" rows="10" id="blogpostcontent" name="blogpostcontent"></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-success pull-right"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Publish</button>
    </div>

    {{ Form::close() }}


</div> <!-- /container -->

@stop
