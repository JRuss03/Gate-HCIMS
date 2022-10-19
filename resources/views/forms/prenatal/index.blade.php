@extends('layouts.main')

@section('title', 'Prenatal Forms')

@section('content')

    <div class="index-contents d-flex justify-content-center">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <span class="d-flex align-items-center auth-card-header">
                        <i class='bx bxs-file'></i>
                        <h6 style="margin-top: 5px;"><strong>Prenatal Forms</strong></h6>
                    </span>
                </div>
                <div class="card-body">
                    <table id="pregnant-tbl" class="table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Form</th>
                                <th>Resident</th>
                                <th>Age</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="td-content">Prenatal Form #1</td>
                                <td class="td-content">Juana Dela Cruz</td>
                                <td class="td-content">28</td>
                                <td>
                                    <a href="{{ route('checkup-forms.prenatal.show') }}">
                                        <i class='bx bx-show btn-table btn-edit' data-tippy-content="View" data-tippy-arrow="false"></i>
                                    </a>
                                    <a href="{{ route('checkup-forms.prenatal.edit') }}">
                                        <i class='bx bx-edit btn-table btn-edit' data-tippy-content="Edit User" data-tippy-arrow="false"></i>
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