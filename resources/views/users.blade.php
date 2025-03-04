@extends('layouts.app')
@section('content')
     <div class="container mt-4">
        <h1>Users list app</h1>
        <div class="offset-md-2 col-md-8">
            <div class="card">
                @if (@isset($user))
               
                     <div class="card-header">
                        Update Users
                    </div>
                    <div class="card-body">
                        <!-- Update User Form -->
                        <form action="{{ url ('upgrade')}}" method="POST">
                            @csrf
                            <input  type="hidden" name="id" value="{{ $user->id }}">
                            <!-- User Name -->
                            <div class="mb-3">
                                <label for="user-name" class="form-label">User</label>
                                <input type="text" name="name" id="user-name" class="form-control" value="{{ $user->name }}">
                            </div>
    
                            <!-- Update User Button -->
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus me-2"></i>upgrade User
                                </button>
                            </div>
                        </form>
                    </div>
                @else
                <div class="card-header">
                    New User
                </div>
                <div class="card-body">
                    <!-- New User Form -->
                    <form action="add" method="POST">
                        @csrf
                        <!-- User Name -->
                        <div class="mb-3">
                            <label for="user-name" class="form-label">User</label>
                            <input type="text" name="name" id="user-name" class="form-control" value="">
                        </div>
                       <!-- User Email -->
                    <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                     <input type="email" name="email" id="email" class="form-control" value="">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                         <input type="password" name="password" id="password" class="form-control" value="">
                        </div>
                        <!-- Add User Button -->
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-2"></i>Add User
                            </button>
                        </div>
                    </form>
                </div>
                @endif
            </div>

            <!-- Current User -->
            <div class="card mt-4">
                <div class="card-header">
                    Current Users
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Users</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <form action="/remove/{{ $user->id }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash me-2"></i>remove
                                        </button>
                                    </form>
                                    <form action="/modify/{{ $user->id }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-trash me-2"></i>upgrade
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                            @endforeach
                           
                               
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

   

   
