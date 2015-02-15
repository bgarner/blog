@extends('admin/template/adminlayout')

@section('title')
Admin Login
@stop

@section('content')

<div class="container">

    @if( count($errors) > 0)
    <h3 style="color: #c00;">Oops!</h3>
        @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
    @endif

    {{ Form::open(array('url' => 'admin', 'class' => 'form-signin')) }}
        <input type="hidden" name="logintype" value="{{ Route::getCurrentRoute()->getPath() }}">
        <h2 class="form-signin-heading">Blog Admin Log In</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input id="password" name="password" class="form-control" type="password" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

    {{ Form::close() }}

</div> <!-- /container -->

@stop
