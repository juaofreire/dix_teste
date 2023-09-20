@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Edit User</h4>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form class="form" method="post" action="{{ route('update', ['id' => $user->id]) }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">User name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    aria-describedby="nameHelp" value="{{ $user->name }}">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    aria-describedby="emailHelp" value="{{ $user->email }}">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Password</h4>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form class="form" method="post" action="{{ route('password', ['id' => $user->id]) }}">
                            @csrf

                            <div class="form-group">
                                <label for="password">New password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm new password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Confirm password">
                            </div>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-primary">Change password</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <form method="POST" action="{{ route('delete', ['id' => $user->id]) }}" id="delete-form" onsubmit="ConfirmDelete()">
        @csrf
        <button type="submit" id="confirm" class="btn btn-danger">Delete User</button>
    </form>


    <script>
        function ConfirmDelete() {
            confirm("This action is definitive, are you sure?")
        };
    </script>
@endsection
