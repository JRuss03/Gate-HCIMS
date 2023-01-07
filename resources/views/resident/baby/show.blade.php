@extends('layouts.main')

@section('title', 'Resident Details - Maria Dela Cruz')
    
@section('content')

@if (Session::has('message'))
    <div id="toast">
        <span class="d-flex align-items-center"><i class='bx bx-check'></i><span>{{ session('message')}}</span></span>
    </div>
@endif
    
<div class="index-contents d-flex justify-content-center">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <span class="d-flex align-items-center auth-card-header">
                    <i class='bx bx-group'></i>
                    <h6 style="margin-top: 5px;"><strong>Resident Details</strong></h6>
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <h4><strong>{{$baby->name}}</strong></h4>
                            <div class="d-flex align-items-center">
                                <span class="d-flex align-items-center">
                                    <i class='bx bx-time-five'></i>
                                    <span class="ms-2">Age: {{$baby->name}}</span>
                                </span>
                                <span class="d-flex align-items-center ms-3">
                                    <i class='bx bx-cake'></i>
                                    <span class="ms-2">Birthday: {{$baby->birthday}}</span>
                                </span>
                            </div>
                        </div>
                        <div class="form-row">
                            <span class="d-flex align-items-center">
                                <i class='bx bx-map'></i>
                                <span class="ms-2">Purok: {{$baby->purok}}</span>
                            </span>
                        </div>
                        <div class="form-row">
                            <h6><strong>Parents</strong></h6>
                            <div class="row">
                                <div class="d-flex align-items-center">
                                    <span class="d-flex align-items-center">
                                        <i class='bx bx-user'></i>
                                        <span class="ms-2">Mother: {{$baby->mother_name}}</span>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-flex align-items-center">
                                    <span class="d-flex align-items-center">
                                        <i class='bx bx-user'></i>
                                        <span class="ms-2">Father: {{$baby->father_name}}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <h6><strong>Guardian</strong></h6>
                            <div class="row">
                                <div class="d-flex align-items-center">
                                    <span class="d-flex align-items-center">
                                        <i class='bx bx-user'></i>
                                        <span class="ms-2">{{$baby->guardian}}</span>
                                    </span>
                                    <span class="d-flex align-items-center ms-3">
                                        <i class='bx bx-phone'></i>
                                        <span class="ms-2">{{$baby->guardian_contact_no}}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6">
                        <div class="form-row">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="d-flex align-content-center" style="width: 40%;">
                                    <i class='bx bxs-file' style="font-size: 2rem; margin-top: 3px;"></i>
                                    <h6 class="ms-2"><strong>Check-up Forms</strong></h6>
                                </span>
                                <a href="" class="btn-add d-flex align-items-center">
                                    <i class='bx bx-plus'></i>
                                    Add New Form
                                </a>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="d-flex align-items-center">
                                <div class="file-icon">
                                    <i class='bx bx-file'></i>
                                </div>
                                <div class="ms-3">
                                    <h6><strong>Check Form</strong></h6>
                                    <span class="d-flex align-items-center">
                                        <i class='bx bx-calendar'></i>
                                        <span class="ms-2">Mar. 22, 2022</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection