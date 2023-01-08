@extends('layouts.main')

@section('title', 'Infant Checkup Form')
    
@section('content')

@if (Session::has('message'))
    <div id="toast">
        <span class="d-flex align-items-center"><i class='bx bx-check'></i><span>{{ session('message')}}</span></span>
    </div>
@endif
    
<div class="index-contents d-flex justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <span class="d-flex align-items-center auth-card-header">
                    <i class='bx bx-file'></i>
                    <h6 style="margin-top: 5px;"><strong>Infant Checkup Form</strong></h6>
                </span>
                <a href="{{ route('checkup-forms.baby.edit', $form->id) }}">
                    <i class='bx bx-edit btn-table btn-edit' data-tippy-content="Edit" data-tippy-arrow="false"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <h4><strong>{{ $baby->name }}</strong></h4>
                            <div class="d-flex align-items-center">
                                <span class="d-flex align-items-center">
                                    <i class='bx bx-cake'></i>
                                    <span class="ms-2">{{ \Carbon\Carbon::parse($baby->birthday)->format('M. d, Y')}}</span>
                                </span>
                                <span class="d-flex align-items-center ms-3">
                                    <i class='bx bx-user'></i>
                                    <span class="ms-2">{{ $form->gender }}</span>
                                </span>
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-lg-12">
                                <span class="d-flex align-items-center">
                                    {{-- <i class='bx bx-user'></i> --}}
                                    <span class="">Birth Weight: {{ $form->birth_weight }}</span>
                                </span>
                                <span class="d-flex align-items-center">
                                    {{-- <i class='bx bx-user'></i> --}}
                                    <span class="">Birth Length: {{ $form->birth_length }}</span>
                                </span>
                                <span class="d-flex align-items-center">
                                    {{-- <i class='bx bx-user'></i> --}}
                                    <span class="">Head Circumference: {{ $form->h_circum }}</span>
                                </span>
                                <span class="d-flex align-items-center">
                                    {{-- <i class='bx bx-user'></i> --}}
                                    <span class="">NBS: {{ $form->nbs }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" style="padding-top: 5px;">
                        <div class="row">
                            <div class="col-lg-12">
                                <span class="d-flex align-items-center">
                                    <i class='bx bx-user'></i>
                                    <span class="ms-2">Mother: {{ $baby->mother_name }}</span>
                                </span>
                            </div>
                            <div class="col-lg-12">
                                <span class="d-flex align-items-center">
                                    <i class='bx bx-briefcase'></i>
                                    <span class="ms-2">{{ $form->mother_occupation }}</span>
                                </span>
                            </div>
                            <div class="col-lg-12">
                                <span class="d-flex align-items-center">
                                    <i class='bx bx-cake'></i>
                                    <span class="ms-2">{{ \Carbon\Carbon::parse($form->mother_birthday)->format('M. d, Y')}}</span>
                                </span>
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-lg-12">
                                <span class="d-flex align-items-center">
                                    <i class='bx bx-user'></i>
                                    <span class="ms-2">Father: {{ $baby->father_name }}</span>
                                </span>
                            </div>
                            <div class="col-lg-12">
                                <span class="d-flex align-items-center">
                                    <i class='bx bx-briefcase'></i>
                                    <span class="ms-2">{{ $form->father_occupation }}</span>
                                </span>
                            </div>
                            <div class="col-lg-12">
                                <span class="d-flex align-items-center">
                                    <i class='bx bx-cake'></i>
                                    <span class="ms-2">{{ \Carbon\Carbon::parse($form->father_birthday)->format('M. d, Y')}}</span>
                                </span>
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-lg-12">
                                <span class="d-flex align-items-center">
                                    <i class='bx bx-map'></i>
                                    <span class="ms-2">Address: {{ $form->address }}</span>
                                </span>
                            </div>
                            <div class="col-lg-12">
                                <span class="d-flex align-items-center">
                                    <i class='bx bx-phone'></i>
                                    <span class="ms-2">{{ $form->cp_no }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row row">
                    <h6><strong>Immunization Record</strong></h6>
                </div>
                @php
                    $immunizations = DB::table('immunizations')->where('checkup_id', $form->id)->get();
                @endphp

                @foreach ($immunizations as $immunization)
                    <div class="row" style="margin-bottom: 20px; margin-top: 10px;">
                        <div class="col-lg-6">
                            <span class="d-flex align-items-center">
                                {{-- <i class='bx bx-phone'></i> --}}
                                <span class="">Immunization: {{ $immunization->immunization }}</span>
                            </span>
                            <span class="d-flex align-items-center">
                                {{-- <i class='bx bx-phone'></i> --}}
                                <span class="">Reaction: {{ $immunization->reaction }}</span>
                            </span>
                        </div>
                        <div class="col-lg-6">
                            <span class="d-flex align-items-center">
                                {{-- <i class='bx bx-phone'></i> --}}
                                <span class="">Dosage: {{ $immunization->dosage }}</span>
                            </span>
                            <span class="d-flex align-items-center">
                                <i class='bx bx-calendar'></i>
                                <span class="ms-2">Date: {{ \Carbon\Carbon::parse($immunization->date)->format('M. d, Y')}}</span>
                            </span>
                        </div>
                    </div>
                @endforeach

                <div class="form-row row">
                    <h6><strong>Follow-up Chart</strong></h6>
                </div>
                @php
                    $follow_ups = DB::table('follow_ups')->where('checkup_id', $form->id)->get();
                @endphp

                @foreach ($follow_ups as $follow_up)
                    <div class="row" style="margin-bottom: 20px; margin-top: 10px;">
                        <div class="col-lg-6">
                            <span class="d-flex align-items-center">
                                {{-- <i class='bx bx-phone'></i> --}}
                                <span class="">Weight: {{ $follow_up->weight }}</span>
                            </span>
                            <span class="d-flex align-items-center">
                                {{-- <i class='bx bx-phone'></i> --}}
                                <span class="">Length: {{ $follow_up->length }}</span>
                            </span>
                            <span class="d-flex align-items-center">
                                {{-- <i class='bx bx-phone'></i> --}}
                                <span class="">Age in months: {{ $follow_up->age_in_mos }}</span>
                            </span>
                        </div>
                        <div class="col-lg-6">
                            <span class="d-flex align-items-center">
                                {{-- <i class='bx bx-phone'></i> --}}
                                <span class="">Nutritional Status: {{ $follow_up->nutritional_status }}</span>
                            </span>
                            <span class="d-flex align-items-center">
                                {{-- <i class='bx bx-phone'></i> --}}
                                <span class="">Physical Exam: {{ $follow_up->physical_exam }}</span>
                            </span>
                            <span class="d-flex align-items-center">
                                {{-- <i class='bx bx-phone'></i> --}}
                                <span class="">Management: {{ $follow_up->management }}</span>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection