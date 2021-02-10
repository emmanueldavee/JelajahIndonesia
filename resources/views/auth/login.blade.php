@extends('layouts.authApp')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="bg-white p-0 row rounded">
            <div class="col-7 bg-dark">

            </div>
            <div class="col-5 py-5 px-5 w-100">
                <div class="heading text-bold text-center">Sign In</div>
                <form action="/login" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="role">Login as:</label>
                        <select name="role" id="role" class="form-control">
                            <option value="user" @if(old('role') == 'user') selected @endif>User</option>
                            <option value="admin" @if(old('role') == 'admin') selected @endif>Admin</option>
                        </select>

                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="text-gray text-small">
                            Don't have an account? <a href="/register">Sign Up</a>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-primary px-5" value="Sign In">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
