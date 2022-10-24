@extends('layouts.main')

@section('title', 'Edit Details - Melchora Aquino')

@section('content')

    <div class="index-contents d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <span class="d-flex align-items-center auth-card-header">
                        <i class='bx bx-user'></i>
                        <h6 style="margin-top: 5px;"><strong>Edit Details</strong></h6>
                    </span>
                </div>
                <div class="card-body">
                <form action="{{ route('seniors.edit-store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="senior_id" value="{{ old('id', $senior->id) }}">
                        <div class="form-row row">
                            <div class="col-lg-6">
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="prob_other_birth">Name:</label>
                                        <input type="text" name="sen_name" id="sen_name" value="{{ old('name', $senior->name) }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="prob_other_birth">Guardian:</label>
                                        <input type="text" name="sen_guardian" id="sen_guardian"  value="{{ old('guardian', $senior->guardian) }}"class="form-control">
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="prob_other_birth">Purok:</label>
                                        <input type="text" name="sen_purok" id="sen_purok"  value="{{ old('purok', $senior->purok) }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="prob_other_birth">Age:</label>
                                        <input type="text" name="sen_age" id="sen_age" value="{{ old('age', $senior->age) }}" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="prob_other_birth">Birthday:</label>
                                        <input type="date" name="sen_bday" id="sen_bday" value="{{ old('birthday', $senior->birthday) }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="prob_other_birth">Guardian Contact Number:</label>
                                        <input type="text" name="sen_g_number" id="sen_g_number" value="{{ old('guardian_contact_no', $senior->guardian_contact_no) }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="d-flex justify-content-end" style="margin-top: 20px;">
                                <button type="submit" class="btn-form d-flex align-items-center">
                                    <i class='bx bx-save btn-icon'></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection