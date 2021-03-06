@extends('admin/template/adminlayout')

@section('title')
Latest Comments
@stop

@section('content')

@include('admin/template/nav')

<div class="container" style="margin-top: 90px;">
    <h1>Latest Comments</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Post</th>
                <th>Commenter</th>
                <th>Comment</th>
                <th>Actions</th>
            </tr>
        </thead>

            @foreach($comments as $c)
            <tr id="comment_row_{{ $c->id }}">
                <td><a href="/admin/post/{{ $c->post_id }}">{{ BlogPost::getBlogPost($c->post_id)->title }}</a></td>
                <td>{{ User::getRealName($c->author) }} <a href="/admin/user/{{ $c->author }}">({{ User::getUsername($c->author) }})</a></td>
                <td>{{ $c->comment }}</td>
                <td>
                    <a href="/read/{{ $c->post_id }}" target="_blank" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-eye-open" aira-hidden="true"></span> View on Blog</a>
                    <!-- <a href="/admin/comment/edit/{{$c->id}}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a> -->


                    <input type="hidden" name="comment_id" id="comment_id" value="{{ $c->id }}">
                    <span data-comment="{{ $c->id }}" id="comment{{$c->id}}" class="comment-delete btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</span>


                </td>
            </tr>
            @endforeach



</div> <!-- /container -->

@stop
