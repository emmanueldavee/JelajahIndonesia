@extends('layouts.app')

@section('content')
<div class="container py-4">
    @if($type == 'user')
        <div class="heading text-bold text-center mb-3">Users</div>
    @else
        <div class="heading text-bold text-center mb-3">Admins</div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-dark rounded">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        @if($type == 'user')
                        <th scope="col">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <a href="{{ url('/users/'.$user->id.'/blogs') }}" class="text-dark">{{ $user->name }}</a>
                            </td>
                            <td>{{ $user->email }}</td>
                            @if($type == 'user')
                            <td>
                                <form action="/users/{{ $user->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
 