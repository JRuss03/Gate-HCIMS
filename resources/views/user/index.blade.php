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
                            <tr>
                                <td class="td-content">
                                    Juan Dela Cruz
                                </td>
                                <td class="td-content">jjdelacruz</td>
                                <td class="td-content">delacruz.juan@gmail.com</td>
                                <td class="td-content">Administrator</td>
                                <td>
                                    <a href="{{ route('users.edit') }}">
                                        <i class='bx bx-edit btn-table btn-edit' data-tippy-content="Edit User" data-tippy-arrow="false"></i>
                                    </a>

                                    <a href="#" onclick="return confirm('Are you sure you want to delete this user?')">
                                        <i class='bx bx-trash btn-table btn-delete' data-tippy-content="Delete User" data-tippy-arrow="false"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-content">
                                    Melchora Aquino
                                </td>
                                <td class="td-content">maquino</td>
                                <td class="td-content">aquino.melchora@gmail.com</td>
                                <td class="td-content">BNS</td>
                                <td>
                                    <a href="{{ route('users.edit') }}">
                                        <i class='bx bx-edit btn-table btn-edit' data-tippy-content="Edit User" data-tippy-arrow="false" ></i>
                                    </a>

                                    <a href="#" onclick="return confirm('Are you sure you want to delete this user?')">
                                        <i class='bx bx-trash btn-table btn-delete' data-tippy-content="Delete User" data-tippy-arrow="false"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection