@extends('admin/template/adminlayout')

@section('title')
Users
@stop

@section('content')

@include('admin/template/nav')

<div class="container" style="margin-top: 90px;">
    <h1>{{ User::getRealName($user->id) }} ({{ $user->username }})  <small>Role: {{ Role::getRole($user->role) }}</small> <a href=""></a></h1>

    <!-- <p>E-mail Address: {{ $user->email }}</p> -->

    @if(Role::getRole($user->role) != "commenter")

    <hr />
    <?php
    $posts = BlogPost::getUserPosts($user->id);
    ?>
    <h2>Posts</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Comments</th>
            </tr>
        </thead>
        @foreach($posts as $p)
        <tr>
            <td><a href="/admin/post/{{ $p->id }}">{{ $p->title }}</a></td>
            <td>{{ $p->updated_at }}</td>
            <td><a href="/admin/post/{{ $p->id }}/comments">5</a></td>
        </tr>
        @endforeach
    </table>
    @endif


    <?php
    $comments = Comment::getCommentsByUser($user->id);
    ?>
    <h2>Comments</h2>
    @if($comments)

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
        <tr>
            <td><a href="/admin/post/{{ $c->post_id }}">{{ BlogPost::getBlogPost($c->post_id)->title }}</a></td>
            <td>{{ User::getRealName($c->author) }} <a href="/admin/user/{{ $c->author }}">({{ User::getUsername($c->author) }})</a></td>
            <td>{{ $c->comment }}</td>
            <td>
                <a href="/read/{{ $c->post_id }}" target="_blank" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-eye-open" aira-hidden="true"></span> View on Blog</a>
                <span data-comment="{{ $c->id }}" id="comment{{$c->id}}" class="comment-delete btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</span>

            </td>
        </tr>
        @endforeach
        </table>
    @else
        <p>No Comments by the user</p>
    @endif


</div> <!-- /container -->

@stop
