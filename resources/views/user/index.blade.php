@extends('layouts.main')

@section('title', 'Users')

@section('content')

    <div class="index-contents d-flex justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center auth-card-header">
                        <i class='bx bx-user'></i>
                        <h6 style="margin-top: 5px;"><strong>Users</strong></h6>
                    </span>
                    <a href="{{ route('users.add') }}" class="btn-add d-flex align-items-center">
                        <i class='bx bx-user-plus' ></i>
                        Add New User
                    </a>
                </div>
                <div class="card-body">
                    <table id="users-tbl" class="table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             
                        @foreach ($users as $user)
                            <tr>
                                <td class="td-content">
                                {{ $user->name }}
                                </td>
                                <td class="td-content">{{ $user->username }}</td>
                                <td class="td-content">{{ $user->email }}</td>
                                <td class="td-content">{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}">
                                        <i class='bx bx-edit btn-table btn-edit' data-tippy-content="Edit User" data-tippy-arrow="false"></i>
                                    </a>

                                    <a data-tippy-content="Delete user" data-tippy-arrow="false" href ="/users/{{$user->id }}" class="btn-table" onclick="return confirm('Are you sure you want to delete this user?') " >
                                                <i class='bx bx-trash' ></i>
                                            </a>
                                    
                                </td>
                            </tr>
                           
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection