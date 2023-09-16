@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Create a New User</h4>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form class="form" method="post" action="{{ route('store') }}">
                            @csrf
                        
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="name">User name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    aria-describedby="nameHelp" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>                        
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection