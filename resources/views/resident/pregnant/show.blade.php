@extends('layouts.main')

@section('title', 'Resident Details')
    
@section('content')
    
<div class="index-contents d-flex justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <span class="d-flex align-items-center auth-card-header">
                    <i class='bx bx-group'></i>
                    <h6 style="margin-top: 5px;"><strong>Resident Details</strong></h6>
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-row">
                            <h4><strong>{{ $pregnant->mother_name }}</strong></h4>
                            <div class="d-flex align-items-center">
                                <span class="d-flex align-items-center">
                                    <i class='bx bx-time-five'></i>
                                    <span class="ms-2">Age: {{ $pregnant->age }}</span>
                                </span>
                                <span class="d-flex align-items-center ms-3">
                                    <i class='bx bx-user'></i>
                                    <span class="ms-2">Children: {{ $pregnant->numberofchildren }}</span>
                                </span>
                            </div>
                        </div>
                        <div class="form-row">
                            <span class="d-flex align-items-center">
                                <i class='bx bx-calendar'></i>
                                <span class="ms-2">Last menstration: {{ $pregnant->mensdate }}</span>
                            </span>
                            <span class="d-flex align-items-center">
                                <i class='bx bx-calendar'></i>
                                <span class="ms-2">Probable birth date: {{ $pregnant->prob_bdate }}</span>
                            </span>
                        </div>
                        <div class="form-row">
                            @php
                                
                                use Illuminate\Support\Facades\DB;

                                $children = DB::table('children')->where('pregnant_id', $pregnant->id)->get();

                            @endphp
                            <h6><strong>Children</strong></h6>
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
                        <div class="form-row">
                            <h6><strong>Problem w/ other births</strong></h6>
                            {{-- <div class="row">
                                <p>Anemia</p>
                            </div> --}}
                            <div class="row">
                                <span class="d-flex align-items-center">
                                    <i class='bx bx-info-circle'></i>
                                    <span class="ms-2">No Problems Indicated</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
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
                                    <h6><strong>Prenatal Checkup March</strong></h6>
                                    <span class="d-flex align-items-center">
                                        <i class='bx bx-calendar'></i>
                                        <span class="ms-2">Mar. 22, 2022</span>
                                    </span>
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