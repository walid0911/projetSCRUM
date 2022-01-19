@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3" style="margin-top: 45px">
            <h4>Gerant Dashboard</h4><hr>
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

                    <td>{{ Auth::guard('gerant')->user()->USERNAME }}</td>
                    <td>{{ Auth::guard('gerant')->user()->email }}</td>
                    <td>{{ Auth::guard('gerant')->user()->USERNAME }}</td>
                    <td>
                        <a href="{{ route('gerant.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        <form action="{{ route('gerant.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
