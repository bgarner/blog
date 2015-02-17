@extends('admin/template/adminlayout')

@section('title')
Blog Posts
@stop

@section('content')

@include('admin/template/nav')

<div class="container" style="margin-top: 90px;">
    <h1>Blog Posts <a href="/admin/posts/new" class="btn btn-lg btn-success pull-right"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> New Blog Post</a></h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Date</th>
                <th>Comments</th>
            </tr>
        </thead>
            <?php

            $role = Role::getRole(Auth::user()->role);
            if($role == "admin"){
                $posts = BlogPost::getAllPosts();
            ?>
                @foreach($posts as $p)
                <tr>
                    <td><a href="/admin/post/{{ $p->id }}">{{ $p->title }}</a></td>
                    <td><a href="/admin/user/{{ $p->author }}">{{ User::getRealName($p->author) }}</a>
                    <td>{{ $p->updated_at }}</td>
                    <td><a href="/admin/post/{{ $p->id }}/comments">5</a></td>
                </tr>
                @endforeach
            <?php
            } else {
                $posts = BlogPost::getUserPosts(Auth::user()->id)
            ?>
                @foreach($posts as $p)
                <tr>
                    <td><a href="/admin/post/{{ $p->id }}">{{ $p->title }}</a></td>
                    <td><a href="/admin/user/{{ $p->author }}">{{ User::getAuthorName($p->author) }}</a>
                    <td>{{ $p->updated_at }}</td>
                    <td><a href="/admin/post/{{ $p->id }}/comments">5</a></td>
                </tr>
                @endforeach
            <?php
            }
            ?>
    </table>
</div> <!-- /container -->

@stop
