@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
            <h4>Gerant Register</h4><hr>
            <form action="{{ route('gerant.create') }}" method="post" autocomplete="off">
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif

                @csrf
                <div class="form-group my-3">
                    <label for="NOM">full name</label>
                    <input type="text" class="form-control" name="NOM" placeholder="Enter full name" value="{{ old('NOM') }}">
                    <span class="text-danger">@error('NOM'){{ $message }} @enderror</span>
                </div>
                <div class="form-group my-3">
                    <label for="USERNAME"> username</label>
                    <input type="text" class="form-control" name="USERNAME" placeholder="Enter Username" value="{{ old('USERNAME') }}">
                    <span class="text-danger">@error('USERNAME'){{ $message }} @enderror</span>
                </div>
                <div class="form-group my-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                    <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                </div>
                <div class="form-group my-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                </div>
                <div class="form-group my-3">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" placeholder="Enter confirm password" value="{{ old('cpassword') }}">
                    <span class="text-danger">@error('cpassword'){{ $message }} @enderror</span>
                </div>
                <div class="form-group my-3">
                    <label for="TEL">Tel:</label>
                    <input type="text" class="form-control" name="TEL" placeholder="Enter votre pays" value="{{ old('TEL') }}">
                    <span class="text-danger">@error('TEL'){{ $message }} @enderror</span>
                </div>
                <div class="form-group my-3">
                    <label for="PAYS">Pays:</label>
                    <input type="text" class="form-control" name="PAYS" placeholder="Enter votre pays" value="{{ old('PAYS') }}">
                    <span class="text-danger">@error('PAYS'){{ $message }} @enderror</span>
                </div>
                <div class="form-group my-3">
                    <label for="VILLE">Ville</label>
                    <input type="text" class="form-control" name="VILLE" placeholder="Enter votre ville" value="{{ old('VILLE') }}">
                    <span class="text-danger">@error('VILLE'){{ $message }} @enderror</span>
                </div>
                <div class="form-group my-3">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
                <br>
                <a href="{{ route('gerant.login') }}">I already have an account</a>
            </form>
        </div>
    </div>
</div>
@endsection
