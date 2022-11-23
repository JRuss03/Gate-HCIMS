@extends('layouts.main')

@section('title', 'Prenatal Forms - Juana Dela Cruz')
    
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
                    <h6 style="margin-top: 5px;"><strong>{{ $prenatal->name }}</strong></h6>
                </span>
                <a href="{{ route('checkup-forms.prenatal.edit', $prenatal->id) }}">
                    <i class='bx bx-edit btn-table btn-edit' data-tippy-content="Edit User" data-tippy-arrow="false"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-row">
                            <h4><strong>{{ $prenatal->pregnant->mother_name }}</strong></h4>
                            <div class="d-flex align-items-center">
                                <span class="d-flex align-items-center">
                                    <i class='bx bx-time-five'></i>
                                    <span class="ms-2">Age: {{ $prenatal->pregnant->age }}</span>
                                </span>
                                <span class="d-flex align-items-center ms-3">
                                    <i class='bx bx-user'></i>
                                    <span class="ms-2">Children: {{ $prenatal->pregnant->numberofchildren }}</span>
                                </span>
                            </div>
                        </div>
                        @php
                                // use DB;

                                $children = DB::table('children')->where('pregnant_id', $prenatal->pregnant_id)->get();
                                
                                $age_arr = array();

                                foreach ($children as $child) {
                                    $age_arr[] = $child->age;
                                }

                                $ages = implode(',', $age_arr);

                                // use Illuminate\Support\Facades\DB;
        
                                $problems = DB::table('problems')->where('pregnant_id', $prenatal->pregnant_id)->get();

                                $details = DB::table('prenatal_details')->where('prenatal_id', $prenatal->id)->get()
                            @endphp

                            <div class="form-row">
                                <p style="margin-bottom: 0px;"><strong>Children</strong></p>
                                @foreach ($children as $child)
                                    
                                <div class="row">
                                    <div class="d-flex align-items-center">
                                        <span class="d-flex align-items-center">
                                            <i class='bx bx-user'></i>
                                            <span class="ms-2">{{ $child->name }}</span>
                                        </span>
                                        <span class="d-flex align-items-center ms-3">
                                            <i class='bx bx-time-five'></i>
                                            <span class="ms-2">Age: {{ $child->age }}</span>
                                        </span>
                                    </div>
                                </div>
    
                                @endforeach
                            </div>
                    </div>
                    <div class="col-lg-6" style="padding-top: 15px;">
                        <div class="form-row">
                            <span class="d-flex align-items-center">
                                <i class='bx bx-user'></i>
                                <span class="ms-2">Date of last childbirth: {{ $prenatal->last_childbirth }}</span>
                            </span>
                            <span class="d-flex align-items-center">
                                <i class='bx bx-time-five'></i>
                                <span class="ms-2">Last menstruation date: {{ $prenatal->mensdate }}</span>
                            </span>
                            <span class="d-flex align-items-center flex-wrap">
                                <i class='bx bx-user'></i>
                                <span class="ms-2">Probable date of birth:</span><span class="ms-2">{{ $prenatal->prob_bdate }}</span>
                            </span>
                        </div>
                        <div class="form-row">
                            <p style="margin-bottom: 0px;"><strong>Problem w/ other births</strong></p>
                            @foreach ($problems as $problem)
                               <div class="row">
                                    <span class="d-flex align-items-center">
                                        <i class='bx bx-clipboard'></i>
                                        <span class="ms-2">{{ $problem->problem }}</span>
                                    </span>
                               </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                @foreach ($details as $detail)
                    <div class="form-row row" style="margin-top: 50px;">
                        <h6><strong>{{ $detail->month }}</strong></h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <span class="d-flex align-items-center flex-wrap">
                                    <i class='bx bx-user'></i>
                                    <span class="ms-2"><strong>Date of visit:</strong></span><span class="ms-2">{{ $detail->dateofvisit }}</span>
                                </span>
                                <span class="d-flex flex-wrap align-items-center">
                                    <i class='bx bx-time-five'></i>
                                    <span class="ms-2"><strong>General Health and Minor Problems:</strong></span>
                                    <span class="ms-2">{{ $detail->general }}</span>
                                </span>
                                <span class="d-flex flex-wrap align-items-center">
                                    <i class='bx bx-time-five'></i>
                                    <span class="ms-2"><strong>Anemia (How severe?):</strong></span>
                                    <span class="ms-2">{{ $detail->anemia }}</span>
                                </span>
                                <span class="d-flex flex-wrap align-items-center">
                                    <i class='bx bx-time-five'></i>
                                    <span class="ms-2"><strong>Danger Signs:</strong></span>
                                    <span class="ms-2">{{ $detail->danger }}</span>
                                </span>
                                <span class="d-flex flex-wrap align-items-center">
                                    <i class='bx bx-time-five'></i>
                                    <span class="ms-2"><strong>Swelling (where? how much?):</strong></span>
                                    <span class="ms-2">{{ $detail->swelling }}</span>
                                </span>
                                <span class="d-flex flex-wrap align-items-center">
                                    <i class='bx bx-time-five'></i>
                                    <span class="ms-2"><strong>Pulse:</strong></span>
                                    <span class="ms-2">{{ $detail->pulse }}</span>
                                </span>
                                <span class="d-flex flex-wrap align-items-center">
                                    <i class='bx bx-time-five'></i>
                                    <span class="ms-2"><strong>Temp:</strong></span>
                                    <span class="ms-2">{{ $detail->temp }}</span>
                                </span>
                            </div>
                            <div class="col-lg-6">
                                <span class="d-flex flex-wrap align-items-center">
                                    <i class='bx bx-time-five'></i>
                                    <span class="ms-2"><strong>Weight (estimate or measure):</strong></span>
                                    <span class="ms-2">{{ $detail->weight }}</span>
                                </span>
                                <span class="d-flex flex-wrap align-items-center">
                                    <i class='bx bx-time-five'></i>
                                    <span class="ms-2"><strong>Blood Pressure:</strong></span>
                                    <span class="ms-2">{{ $detail->bloodpressure }}</span>
                                </span>
                                <span class="d-flex flex-wrap align-items-center">
                                    <i class='bx bx-time-five'></i>
                                    <span class="ms-2"><strong>Protien in urine:</strong></span>
                                    <span class="ms-2">{{ $detail->proteininurine }}</span>
                                </span>
                                <span class="d-flex flex-wrap align-items-center">
                                    <i class='bx bx-time-five'></i>
                                    <span class="ms-2"><strong>Sugar in urine:</strong></span>
                                    <span class="ms-2">{{ $detail->sugarinurine }}</span>
                                </span>
                                <span class="d-flex flex-wrap align-items-center">
                                    <i class='bx bx-time-five'></i>
                                    <span class="ms-2"><strong>Position of baby in womb:</strong></span>
                                    <span class="ms-2">{{ $detail->position }}</span>
                                </span>
                                <span class="d-flex flex-wrap align-items-center">
                                    <i class='bx bx-time-five'></i>
                                    <span class="ms-2"><strong>Tetanus vaccine:</strong></span>
                                    <span class="ms-2">{{ $detail->vaccine }}</span>
                                </span>
                                <span class="d-flex flex-wrap align-items-center">
                                    <i class='bx bx-time-five'></i>
                                    <span class="ms-2"><strong>Birth:</strong></span>
                                    <span class="ms-2">{{ $detail->birth }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

@endsection