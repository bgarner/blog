@extends('admin/template/adminlayout')

@section('title')
Latest Comments
@stop

@section('content')

@include('admin/template/nav')

<div class="container" style="margin-top: 90px;">
    <h1>Comments for <em>{{ $blogpost->title }}</em></h1>

    <table class="table table-hover">
        <thead>
            <tr>

                <th>Commenter</th>
                <th>Comment</th>
                <th>Actions</th>
            </tr>
        </thead>

            @foreach($comments as $c)
            <tr>

                <td>{{ User::getRealName($c->author) }} <a href="/admin/user/{{ $c->author }}">({{ User::getUsername($c->author) }})</a></td>
                <td>{{ $c->comment }}</td>
                <td>
                    <a href="/read/{{ $c->post_id }}" target="_blank" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-eye-open" aira-hidden="true"></span> View on Blog</a>
                    <a href="/admin/comment/edit/{{$c->id}}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
                    <a href="" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>

                </td>
            </tr>
            @endforeach



</div> <!-- /container -->

@stop
