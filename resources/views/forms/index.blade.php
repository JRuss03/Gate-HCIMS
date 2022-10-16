@extends('layouts.main')

@section('title', 'Check-up Forms')

@section('content')

    <div class="index-contents d-flex justify-content-center">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <span class="d-flex align-items-center auth-card-header">
                        <i class='bx bxs-file'></i>
                        <h6 style="margin-top: 5px;"><strong>Check-up Forms</strong></h6>
                    </span>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="file-icon">
                                    <i class='bx bx-file'></i>
                                </div>
                                <div class="ms-3">
                                    <h6><strong>Prenatal Checkup</strong></h6>
                                    <span class="d-flex align-items-center">
                                        <i class='bx bx-user'></i>
                                        <span class="ms-2">Pregnant Residents</span>
                                    </span>
                                </div>
                            </div>
                            <div>
                                <a href="">
                                    <i class='bx bx-list-ul btn-table btn-edit' data-tippy-content="Index" data-tippy-arrow="false"></i>
                                </a>
                                <a href="{{ route('checkup-forms.prenatal.list') }}" class="ms-3">
                                    <i class='bx bx-plus btn-table btn-edit' data-tippy-content="Add New Form" data-tippy-arrow="false"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="file-icon">
                                    <i class='bx bx-file'></i>
                                </div>
                                <div class="ms-3">
                                    <h6><strong>Check Form</strong></h6>
                                    <span class="d-flex align-items-center">
                                        <i class='bx bx-user'></i>
                                        <span class="ms-2">Senior Residents</span>
                                    </span>
                                </div>
                            </div>
                            <div>
                                <a href="">
                                    <i class='bx bx-list-ul btn-table btn-edit' data-tippy-content="Index" data-tippy-arrow="false"></i>
                                </a>
                                <a href="" class="ms-3">
                                    <i class='bx bx-plus btn-table btn-edit' data-tippy-content="Add New Form" data-tippy-arrow="false"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="file-icon">
                                    <i class='bx bx-file'></i>
                                </div>
                                <div class="ms-3">
                                    <h6><strong>Check Form</strong></h6>
                                    <span class="d-flex align-items-center">
                                        <i class='bx bx-user'></i>
                                        <span class="ms-2">Baby Residents</span>
                                    </span>
                                </div>
                            </div>
                            <div>
                                <a href="">
                                    <i class='bx bx-list-ul btn-table btn-edit' data-tippy-content="Index" data-tippy-arrow="false"></i>
                                </a>
                                <a href="" class="ms-3">
                                    <i class='bx bx-plus btn-table btn-edit' data-tippy-content="Add New Form" data-tippy-arrow="false"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection