@extends('layouts.main')

@section('title', 'Edit Details - Maria Dela Cruz')

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
                <form action="{{ route('baby.edit-store') }}" method="POST">
                @csrf
                <input type="hidden" name="baby_id" value="{{ old('id', $baby->id) }}">
                        <div class="form-row row">
                        <div class="form-row row">
                            <div class="col-lg-6">
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="prob_other_birth">Name:</label>
                                        <input type="text" name="baby_name" id="baby_name" value="{{ old('name', $baby->name) }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="prob_other_birth">Age:</label>
                                        <input type="text" name="baby_age" id="baby_age"  value="{{ old('age', $baby->age) }}" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="prob_other_birth">Birthday:</label>
                                        <input type="text" name="baby_bday" id="baby_birthday" value="{{ old('birthday', $baby->birthday) }}"  class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="prob_other_birth">Purok:</label>
                                        <input type="text" name="baby_purok" id="baby_purok"  value="{{ old('purok', $baby->purok) }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="prob_other_birth">Guardian:</label>
                                        <input type="text" name="baby_guardian" id="baby_guardian" value="{{ old('guardian', $baby->guardian) }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="prob_other_birth">Mother's Name:</label>
                                        <input type="text" name="baby_m_name" id="baby_m_name" value="{{ old('mother_name', $baby->mother_name) }}"class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="prob_other_birth">Father's Name:</label>
                                        <input type="text" name="baby_f_name" id="baby_f_name"  value="{{ old('father_name', $baby->father_name) }}"class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="prob_other_birth">Guardian Contact Number:</label>
                                        <input type="text" name="baby_g_number" id="baby_g_number" value="{{ old('guardian_contact_no', $baby->guardian_contact_no) }}" class="form-control">
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