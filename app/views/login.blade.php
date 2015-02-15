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


    @if( count($errors) > 0)
        <h3 style="color: #c00;">Oops!</h3>
        @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
    @endif

    <form class="form-signin">
        <input type="hidden" name="logintype" value="{{ Route::getCurrentRoute()->getPath() }}">
        <h2 class="form-signin-heading">Please Sign In</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>



@stop
