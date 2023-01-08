@extends('layouts.main')

@section('title', 'Consultation Details')
    
@section('content')

@if (Session::has('message'))
    <div id="toast">
        <span class="d-flex align-items-center"><i class='bx bx-check'></i><span>{{ session('message')}}</span></span>
    </div>
@endif
    
<div class="index-contents d-flex justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header d-flex aling-items-center justify-content-between">
                <span class="d-flex align-items-center auth-card-header">
                    <i class='bx bx-group'></i>
                    <h6 style="margin-top: 5px;"><strong>Consultation Details</strong></h6>
                </span>
                <span class="d-flex align-items-center">
                    <i class='bx bx-calendar'></i>
                    <span class="ms-2">Date: {{ \Carbon\Carbon::parse($form->date)->format('M. d, Y')}}</span>
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6" style="padding-right: 50px;">
                        <div class="form-row">
                            <h4><strong>{{$form->firstname}} {{$form->middlename}} {{$form->lastname}}</strong></h4>
                            <div class="d-flex align-items-center">
                                <span class="d-flex align-items-center">
                                    <i class='bx bx-time-five'></i>
                                    <span class="ms-2">Age: {{$form->age}}</span>
                                </span>
                                <span class="d-flex align-items-center ms-3">
                                    <i class='bx bx-cake'></i>
                                    <span class="ms-2">Birthday: {{ \Carbon\Carbon::parse($form->date_of_birth)->format('M. d, Y')}}</span>
                                </span>
                            </div>
                            <span class="d-flex align-items-center" style="margin-top: 5px;">
                                <i class='bx bx-user'></i>
                                <span class="ms-2">Gender: {{$form->gender}}</span>
                            </span>
                        </div>
                        <div class="form-row row">
                            <span class="d-flex align-items-start">
                                <i class='bx bx-map' style="margin-top: 3px;"></i>
                                <span class="ms-2">Address: {{$form->address}}</span>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-row row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <p>HT/WT: </p>
                                    <p style="margin-top: -15px;">
                                        {{$form->ht_wt}}
                                    </p>
                                </div>
                                <div class="row">
                                    <p>Blood pressure: </p>
                                    <p style="margin-top: -15px;">
                                        {{$form->bp}}
                                    </p>
                                </div>
                                <div class="row">
                                    <p>FBS: </p>
                                    <p style="margin-top: -15px;">
                                        {{$form->fbs}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <p>Service provided: </p>
                                    <p style="margin-top: -15px;">
                                        {{$form->service_provided}}
                                    </p>
                                </div>
                                <div class="row">
                                    <p>Medicine given: </p>
                                    <p style="margin-top: -15px;">
                                        {{$form->med_given}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection