@extends('layouts.main')

@section('title', 'New Prenatal Form')

@section('content')

    <div class="index-contents d-flex justify-content-center">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <span class="d-flex align-items-center auth-card-header">
                        <i class='bx bxs-file'></i>
                        <h6 style="margin-top: 5px;"><strong>New Prenatal Form - Select Resident</strong></h6>
                    </span>
                </div>
                <div class="card-body">
                    <table id="pregnant-tbl" class="table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Resident</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="td-content">
                                    Juana Dela Cruz
                                </td>
                                <td>
                                    <a href="{{ route('checkup-forms.prenatal.add') }}">
                                        <i class='bx bx-check btn-table btn-edit' data-tippy-content="Select this resident" data-tippy-arrow="false"></i>
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