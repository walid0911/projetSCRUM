@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3" style="margin-top: 45px">
            <h4>client Dashboard</h4><hr>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Username</th>
                </tr>
                </thead>
                <tbody>
                <tr>

                    <td>{{ Auth::guard('client')->user()->NOM }}</td>
                    <td>{{ Auth::guard('client')->user()->email }}</td>
                    <td>{{ Auth::guard('client')->user()->USERNAME}}</td>
                    <td>
                        <a href="{{ route('client.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        <form action="{{ route('client.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
