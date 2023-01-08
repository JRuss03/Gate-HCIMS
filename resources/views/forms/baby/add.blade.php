@extends('layouts.main')

@section('title', 'Infant Checkup Form')

@section('content')

    <div class="index-contents d-flex justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <span class="d-flex align-items-center auth-card-header">
                        <i class='bx bxs-file'></i>
                        <h6 style="margin-top: 5px;"><strong>Infant Checkup Form</strong></h6>
                    </span>
                </div>
                <div class="card-body">
              
                    <form action="{{ route('checkup-forms.baby.register') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-row">
                                    <h4><strong>{{ $baby->name }}</strong></h4>
                                    <input type="hidden" name="baby_id" value="{{ $baby->id }}">
                                    {{-- <input type="hidden" name="birthday" value="{{ $baby->birthday }}"> --}}
                                    <div class="d-flex align-items-center">
                                        <span class="d-flex align-items-center">
                                            <i class='bx bx-cake'></i>
                                            <span class="ms-2">{{ \Carbon\Carbon::parse($baby->birthday)->format('M. d, Y')}}</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="col-lg-12">
                                        <label for="gender">Gender:</label>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="male" value="Male" required>
                                                <label class="form-check-label" for="male">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check d-flex align-items-center ms-3">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="female" value="Female" required>
                                                <label class="form-check-label" for="female">
                                                    female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="form-row row">
                                    <div class="col-lg-4">
                                        <label for="mother_name">Mother's Name:</label>
                                        <input type="text" name="mother_name" id="mother_name" class="form-control" value="{{ old('mother_name', $baby->mother_name) }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="mother_occupation">Occupation:</label>
                                        <input type="text" name="mother_occupation" id="mother_occupation" class="form-control" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="mother_birthday">Date of birth:</label>
                                        <input type="date" name="mother_birthday" id="mother_birthday" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="col-lg-4">
                                        <label for="father_name">Father's Name:</label>
                                        <input type="text" name="father_name" id="father_name" class="form-control" value="{{ old('father_name', $baby->father_name) }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="father_occupation">Occupation:</label>
                                        <input type="text" name="father_occupation" id="father_occupation" class="form-control" required >
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="father_birthday">Date of birth:</label>
                                        <input type="date" name="father_birthday" id="father_birthday" class="form-control" required >
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="col-lg-8">
                                        <label for="address">Address:</label>
                                        <input type="text" name="address" id="address" class="form-control" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="cp_no">Cellphone No:</label>
                                        <input type="text" name="cp_no" id="cp_no" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row row">
                            <div class="col-lg-3">
                                <label for="birth_weight">Birth Weight (kgs):</label>
                                <input type="text" name="birth_weight" id="birth_weight" class="form-control" >
                            </div>
                            <div class="col-lg-3">
                                <label for="birth_length">Birth length (cm):</label>
                                <input type="text" name="birth_length" id="birth_length" class="form-control" >
                            </div>
                            <div class="col-lg-3">
                                <label for="h_circum">Head circumference:</label>
                                <input type="text" name="h_circum" id="h_circum" class="form-control" >
                            </div>
                            <div class="col-lg-3">
                                <label for="nbs">NBS:</label>
                                <input type="text" name="nbs" id="nbs" class="form-control" >
                            </div>
                        </div>
                        <input type="hidden" id="immuno_id" value="0">
                        <div class="show_item">
                            <div>
                                <div class="form-row row" style="margin-top: 50px;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6><strong>Immunization Record</strong></h6>
                                        <a id="add_field" onclick="buttonClick()">
                                            <i class='bx bx-list-plus btn-table btn-edit' data-tippy-content="Add New Fields" data-tippy-arrow="false"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="col-lg-3">
                                        <label for="immunization">Immunization:</label>
                                        <select name="immunization[]" id="immunization" class="form-select">
                                            <option value=""></option>
                                            <option value="BCG-RHU/BHS">BCG-RHU/BHS</option>
                                            <option value="BCG-Hospital">BCG-Hospital</option>
                                            <option value="HEPA B-RHU/BHS">HEPA B-RHU/BHS</option>
                                            <option value="HEPA B-Hospital">HEPA B-Hospital</option>
                                            <option value="PENTAVALENT">PENTAVALENT</option>
                                            <option value="OPV">OPV</option>
                                            <option value="IPV">IPV</option>
                                            <option value="PCV 13">PCV 13</option>
                                            <option value="ROTAVIRUS">ROTAVIRUS</option>
                                            <option value="MMR">MMR</option>
                                            <option value="FIC">FIC</option>
                                            <option value="CIC">CIC</option>
                                            <option value="Others">Others</option>
                                        </select>
                                        <input type="hidden" name="immuno_uniqid[]" id="immuno_uniqid">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="dosage">Dosage:</label>
                                        <select name="dosage[]" id="dosage" class="form-select">
                                            <option value=""></option>
                                            <option value="1st">1st</option>
                                            <option value="2nd">2nd</option>
                                            <option value="3rd">3rd</option>
                                            <option value="Booster 1">Booster 1</option>
                                            <option value="Booster 2">Booster 2</option>
                                            <option value="Booster 3">Booster 3</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="reaction">Reaction:</label>
                                        <input type="text" name="reaction[]" id="reaction" class="form-control" >
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="immuno_date">Date:</label>
                                        <input type="date" name="immuno_date[]" id="immuno_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="follow_up">
                            <input type="hidden" id="follow_id" value="0">
                            <div>
                                <div class="form-row row" style="margin-top: 50px;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6><strong>Follow-Up Chart</strong></h6>
                                        <a id="follow_add_field" onclick="followbuttonClick()">
                                            <i class='bx bx-list-plus btn-table btn-edit' data-tippy-content="Add New Fields" data-tippy-arrow="false"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="col-lg-4">
                                        <label for="follow_date">Date:</label>
                                        <input type="date" name="follow_date[]" id="follow_date" class="form-control" >
                                        <input type="hidden" name="uniqid[]" id="uniqid">
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="col-lg-4">
                                        <label for="follow_weight">Weight:</label>
                                        <input type="text" name="follow_weight[]" id="follow_weight" class="form-control" >
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="follow_length">Length:</label>
                                        <input type="text" name="follow_length[]" id="follow_length" class="form-control" >
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="age_in_mos">Age in months:</label>
                                        <input type="text" name="age_in_mos[]" id="age_in_mos" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="col-lg-4">
                                        <label for="follow_status">Nutritional Status:</label>
                                        <input type="text" name="follow_status[]" id="follow_status" class="form-control" >
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="physical_exam">Physical Exam:</label>
                                        <input type="text" name="follow_length[]" id="follow_length" class="form-control" >
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="management">Management:</label>
                                        <input type="text" name="management[]" id="management" class="form-control" >
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

    @section('page-scripts')
        <script>
            var i = 0;
            function buttonClick() {
                document.getElementById('immuno_id').value = ++i;
            }

        </script>

        <script>
            var i = 0;
            function followbuttonClick() {
                document.getElementById('follow_id').value = ++i;
            }

        </script>

        <script type="module">
            import { v4 as uuidv4 } from 'https://jspm.dev/uuid';

            $(document).ready(function() {
                $('#immuno_uniqid').val(uuidv4());
                $('#uniqid').val(uuidv4());

                $('#add_field').on('click', function(e) {
                    let immuno_id = $('#immuno_id').val();
                    $('.show_item').append('<div> <div class="form-row row" style="margin-top: 50px;"> <div class="d-flex justify-content-between align-items-center"> <h6><strong>Additional Immunization Record</strong></h6> <a class="remove_field"><i class="bx bx-trash btn-table btn-edit" data-tippy-content="Remove" data-tippy-arrow="false"></i></a> </div></div><div class="form-row row"><div class="col-lg-3"> <label for="immunization">Immunization:</label> <select name="immunization[]" id="immunization'+ immuno_id +'" class="form-select"> <option value=""></option> <option value="BCG-RHU/BHS">BCG-RHU/BHS</option> <option value="BCG-Hospital">BCG-Hospital</option> <option value="HEPA B-RHU/BHS">HEPA B-RHU/BHS</option> <option value="HEPA B-Hospital">HEPA B-Hospital</option> <option value="PENTAVALENT">PENTAVALENT</option> <option value="OPV">OPV</option> <option value="IPV">IPV</option> <option value="PCV 13">PCV 13</option> <option value="ROTAVIRUS">ROTAVIRUS</option> <option value="MMR">MMR</option> <option value="FIC">FIC</option> <option value="CIC">CIC</option> <option value="Others">Others</option> </select> <input type="hidden" name="immuno_uniqid[]" id="immuno_uniqid'+ immuno_id +'"> </div><div class="col-lg-3"> <label for="dosage">Dosage:</label> <select name="dosage[]" id="dosage'+ immuno_id +'" class="form-select"> <option value=""></option> <option value="1st">1st</option> <option value="2nd">2nd</option> <option value="3rd">3rd</option> <option value="Booster 1">Booster 1</option> <option value="Booster 2">Booster 2</option> <option value="Booster 3">Booster 3</option> </select> </div><div class="col-lg-3"> <label for="reaction">Reaction:</label> <input type="text" name="reaction[]" id="reaction'+ immuno_id +'" class="form-control" > </div><div class="col-lg-3"> <label for="immuno_date">Date:</label> <input type="date" name="immuno_date[]" id="immuno_date'+ immuno_id +'" class="form-control"> </div></div></div>');
                    $('#immuno_uniqid' + immuno_id).val(uuidv4());
                });

                $('#follow_add_field').on('click', function(e) {
                    let follow_id = $('#follow_id').val();
                    $('.follow_up').append('<div> <div class="form-row row" style="margin-top: 50px;"> <div class="d-flex justify-content-between align-items-center"> <h6><strong>Additional Record</strong></h6> <a class="remove_field"><i class="bx bx-trash btn-table btn-edit" data-tippy-content="Remove" data-tippy-arrow="false"></i></a> </div></div><div class="form-row row"> <div class="col-lg-4"> <label for="follow_date">Date:</label> <input type="date" name="follow_date[]" id="follow_date'+ follow_id +'" class="form-control" > <input type="hidden" name="uniqid[]" id="uniqid'+ follow_id +'"> </div></div><div class="form-row row"> <div class="col-lg-4"> <label for="follow_weight">Weight:</label> <input type="text" name="follow_weight[]" id="follow_weight'+ follow_id +'" class="form-control" > </div><div class="col-lg-4"> <label for="follow_length">Length:</label> <input type="text" name="follow_length[]" id="follow_length'+ follow_id +'" class="form-control" > </div><div class="col-lg-4"> <label for="age_in_mos">Age in months:</label> <input type="text" name="age_in_mos[]" id="age_in_mos'+ follow_id +'" class="form-control" > </div></div><div class="form-row row"> <div class="col-lg-4"> <label for="follow_status">Nutritional Status:</label> <input type="text" name="follow_status[]" id="follow_status'+ follow_id +'" class="form-control" > </div><div class="col-lg-4"> <label for="physical_exam">Physical Exam:</label> <input type="text" name="follow_length[]" id="follow_length'+ follow_id +'" class="form-control" > </div><div class="col-lg-4"> <label for="management">Management:</label> <input type="text" name="management[]" id="management'+ follow_id +'" class="form-control" > </div></div></div></div>');
                    $('#uniqid' + follow_id).val(uuidv4());
                });

                $('.show_item').on('click', '.remove_field', function(e) {
                    e.preventDefault();

                    let row_item = $(this).parent().parent().parent();
                    $(row_item).remove();
                })

                $('.follow_up').on('click', '.remove_field', function(e) {
                    e.preventDefault();

                    let row_item = $(this).parent().parent().parent();
                    $(row_item).remove();
                })

            });
            
        </script>
        
    @endsection
    
@endsection