@extends('layouts.main')

@section('title', 'Edit Consultation')

@section('content')

    <div class="index-contents d-flex justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <span class="d-flex align-items-center auth-card-header">
                        <i class='bx bxs-file'></i>
                        <h6 style="margin-top: 5px;"><strong>Edit Consultation</strong></h6>
                    </span>
                </div>
                <div class="card-body">
              
                    <form action="{{ route('checkup-forms.daily.update') }}" method="POST">
                        @csrf
                        <div class="form-row row">
                            <div class="col-lg-4">
                                <label for="date">Date:</label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $form->date) }}">
                                <input type="hidden" name="form_id" id="form_id" class="form-control" value="{{ old('date', $form->id) }}">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-lg-4">
                                <label for="lastname">Last Name:</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname', $form->lastname) }}">
                            </div>
                            <div class="col-lg-4">
                                <label for="firstname">First Name:</label>
                                <input type="text" name="firstname" id="firstname" class="form-control" value="{{ old('firstname', $form->firstname) }}">
                            </div>
                            <div class="col-lg-4">
                                <label for="middlename">Middle Name:</label>
                                <input type="text" name="middlename" id="middlename" class="form-control" value="{{ old('middlename', $form->middlename) }}">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-lg-4">
                                <label for="gender">Gender:</label>
                                {{-- <input type="text" name="gender" id="gender" class="form-control" > --}}
                                <div class="d-flex align-items-center">
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="radio" name="gender"
                                            id="male"  value="Male" {{ old('Male', $form->gender) ===  "Male"  ? "checked" : "" }}>
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center ms-3">
                                        <input class="form-check-input" type="radio" name="gender"
                                            id="female"  value="Female" {{ old('Female', $form->gender) ===  "Female"  ? "checked" : "" }}>
                                        <label class="form-check-label" for="female">
                                            female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="age">Age:</label>
                                <input type="text" name="age" id="age" class="form-control" value="{{ old('middlename', $form->age) }}">
                            </div>
                            <div class="col-lg-4">
                                <label for="date_of_birth">Date of birth:</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('middlename', $form->date_of_birth) }}">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-lg-4">
                                <label for="address">Address:</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ old('middlename', $form->address) }}">
                            </div>
                            <div class="col-lg-4">
                                <label for="ht_wt">HT/WT:</label>
                                <input type="text" name="ht_wt" id="ht_wt" class="form-control" value="{{ old('middlename', $form->ht_wt) }}">
                            </div>
                            <div class="col-lg-4">
                                <label for="bp">Blood pressure:</label>
                                <input type="text" name="bp" id="bp" class="form-control" value="{{ old('middlename', $form->bp) }}">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-lg-4">
                                <label for="fbs">FBS:</label>
                                <input type="text" name="fbs" id="fbs" class="form-control" value="{{ old('middlename', $form->fbs) }}">
                            </div>
                            <div class="col-lg-4">
                                <label for="service_provided">Service provided:</label>
                                <input type="text" name="service_provided" id="service_provided" class="form-control" value="{{ old('middlename', $form->service_provided) }}">
                            </div>
                            <div class="col-lg-4">
                                <label for="med_given">Medicine given:</label>
                                <input type="text" name="med_given" id="med_given" class="form-control" value="{{ old('middlename', $form->med_given) }}">
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
                document.getElementById('prob_id').value = ++i;
            }

        </script>

        <script type="module">
            import { v4 as uuidv4 } from 'https://jspm.dev/uuid';

            $(document).ready(function() {
                $('#detail_uniqid').val(uuidv4());

                $('#add_field').on('click', function(e) {
                    let detail_id = $('#detail_id').val();
                    $('.show_item').append('<div class="form-row row" style="margin-top: 50px;"><div><div class="d-flex justify-content-between align-items-center"><h6><strong>Information</strong></h6><a class="remove_field"><i class="bx bx-trash btn-table btn-edit" data-tippy-content="Add New Fields" data-tippy-arrow="false"></i></a></div></div><div class="form-row row"><div class="col-lg-3"><label for="month">Month:</label><select name="month[]" id="month'+ detail_id +'" class="form-select"> <option value=""></option> <option value="January">January</option> <option value="February">February</option> <option value="March">March</option> <option value="April">April</option> <option value="May">May</option> <option value="June">June</option> <option value="July">July</option> <option value="August">August</option> <option value="September">September</option> <option value="October">October</option> <option value="November">November</option> <option value="December">December</option> </select><input type="hidden" name="detail_uniqid[]" id="detail_uniqid'+ detail_id +'"></div><div class="col-lg-3"><label for="date_visit">Date of visit:</label><input type="date" name="date_visit[]" id="date_visit'+ detail_id +'" class="form-control" ></div><div class="col-lg-3"><label for="ghmp">General Health and Minor Problems:</label><input type="text" name="ghmp[]" id="ghmp'+ detail_id +'" class="form-control" ></div><div class="col-lg-3"><label for="anemia">Anemia (How severe?):</label><input type="text" name="anemia[]" id="anemia'+ detail_id +'" class="form-control" ></div></div><div class="form-row row"><div class="col-lg-3"><label for="danger_signs">Danger Signs:</label><input type="text" name="danger_signs[]" id="danger_signs'+ detail_id +'" class="form-control"></div><div class="col-lg-3"><label for="swelling">Swelling (where? how much?):</label><input type="text" name="swelling[]" id="swelling'+ detail_id +'" class="form-control"></div><div class="col-lg-3"><label for="pulse">Pulse:</label><input type="text" name="pulse[]" id="pulse'+ detail_id +'" class="form-control"></div><div class="col-lg-3"><label for="temp">Temp:</label><input type="text" name="temp[]" id="temp'+ detail_id +'" class="form-control"></div></div><div class="form-row row"><div class="col-lg-3"><label for="weight">Weight (estimate or measure):</label><input type="text" name="weight[]" id="weight'+ detail_id +'" class="form-control"></div><div class="col-lg-3"><label for="blood_pressure">Blood Pressure:</label><input type="text" name="blood_pressure[]" id="blood_pressure'+ detail_id +'" class="form-control"></div><div class="col-lg-3"><label for="protein_urine">Protein in urine:</label><input type="text" name="protein_urine[]" id="protein_urine'+ detail_id +'" class="form-control"></div><div class="col-lg-3"><label for="sugar_urine">Sugar in urine:</label><input type="text" name="sugar_urine[]" id="sugar_urine'+ detail_id +'" class="form-control"></div></div><div class="form-row row"><div class="col-lg-3"><label for="position">Position of baby in womb:</label><input type="text" name="position[]" id="position'+ detail_id +'" class="form-control"></div><div class="col-lg-3"><label for="vaccine">Tetanus vaccine:</label><select name="vaccine[]" id="vaccine'+ detail_id +'" class="form-select"><option value=""></option><option value="1st">1st dose</option><option value="2nd">2nd dose or booster</option><option value="3rd">3rd dose</option></select></div><div class="col-lg-3"><label for="birth">Birth:</label><input type="date" name="birth[]" id="birth'+ detail_id +'" class="form-control"></div></div></div></div>');
                    $('#detail_uniqid' + detail_id).val(uuidv4());
                });

                $('.show_item').on('click', '.remove_field', function(e) {
                    e.preventDefault();

                    let row_item = $(this).parent().parent().parent();
                    $(row_item).remove();
                })

            });
            
        </script>
        
    @endsection
    
@endsection