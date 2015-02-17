@extends('admin/template/adminlayout')

@section('title')
Users
@stop

@section('content')

@include('admin/template/nav')

<div class="container" style="margin-top: 90px;">
    <h1>Users<a href="/admin/user/new" class="btn btn-lg btn-success pull-right"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> New User</a></h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Username</th>
                <th>Real Name</th>
                <th>Role</th>
                <th>Comments</th>
                <th>Posts</th>
            </tr>
        </thead>
        <?php
        $role = Role::getRole(Auth::user()->role);
        if($role == "admin"){
            $users = User::getAllUsers();
            ?>
                @foreach($users as $u)
                <tr>
                    <td><a href="/admin/user/{{ $u->id }}">{{ $u->username }}</a></td>
                    <td><a href="/admin/user/{{ $u->id }}">{{ $u->first_name }} {{ $u->last_name }}</a>
                    <td>{{ Role::getRole($u->role) }}</td>

                    <td><a href="/admin/user/comments/{{ $u->id }}">View Comments</a></td>

                    <?php

                    if( Role::getRole($u->role) != "commenter" ) { ?>
                        <td><a href="/admin/user/posts/{{ $u->id }}">View Posts</a></td>
                    <?php } else { ?>
                        <td></td>
                    <?php } ?>

                </tr>
                @endforeach
            <?php
            } else {
            ?>
            </table>

            <h2>Sorry, only the admin can view this section</h2>

            <?php
            }
            ?>

        </div> <!-- /container -->

        @stop
