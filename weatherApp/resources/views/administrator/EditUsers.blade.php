@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <div class="d-flex justify-content-between align-items-left">
                <h1>Users</h1>
            </div>
            @foreach($users as $user)
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>{{$user->employee_code}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Name: </strong>{{$user->first_name}} {{$user->name}}</p>
                                <p><strong>Email: </strong>{{$user->email}}</p>
                                <p><strong>Role: </strong>{{$user->user_role}}, {{$user->userRole->role}}</p>
                                <p><strong>Created at: </strong>{{$user->created_at}}</p>
                                <p><strong>Last updated: </strong>{{$user->updated_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
