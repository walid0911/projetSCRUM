@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
            <h4>Client Login</h4><hr>
            <form action="{{ route('client.check') }}" method="post" autocomplete="off">
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                @csrf
                <div class="form-group my-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                </div>
                <div class="form-group my-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                </div>
                <div class="form-group my-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <br>
                <a href="{{ route('client.register') }}">Create new Account</a>
            </form>
        </div>
    </div>
</div>
@endsection
