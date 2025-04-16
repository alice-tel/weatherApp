@extends('layouts.app')

@section('content')

    <div>
        <h1 class="text-center">EditUsersAdminOnly</h1>


    </div>
    <div>

        @foreach($users as $user)
            <p>{{ $user->name }} - Role: {{ $user->user_role }}</p>
        @endforeach
    </div>
@endsection
