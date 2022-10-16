@extends('layouts.main')

@section('title', 'New Prenatal Form')

@section('content')

    <div class="index-contents d-flex justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <span class="d-flex align-items-center auth-card-header">
                        <i class='bx bxs-file'></i>
                        <h6 style="margin-top: 5px;"><strong>New Prenatal Form</strong></h6>
                    </span>
                </div>
                <div class="card-body">
                    <form action="">
                        @csrf
                        <div class="form-row row">
                            <div class="col-lg-3">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" value="Juana Dela Cruz" class="form-control" required>
                            </div>
                            <div class="col-lg-3">
                                <label for="age">Age:</label>
                                <input type="text" name="age" id="age" value="28" class="form-control" required>
                            </div>
                            <div class="col-lg-3">
                                <label for="num_children">Number of children:</label>
                                <input type="text" name="num_children" id="num_children" value="2" class="form-control" required>
                            </div>
                            <div class="col-lg-3">
                                <label for="ages_children">Ages:</label>
                                <input type="text" name="ages_children" id="ages_children" value="10,5" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-lg-3">
                                <label for="name">Date of last childbirth:</label>
                                <input type="date" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="col-lg-3">
                                <label for="age">Last menstruation date:</label>
                                <input type="date" name="age" id="age" class="form-control" required>
                            </div>
                            <div class="col-lg-3">
                                <label for="num_children">Probable date of birth:</label>
                                <input type="date" name="num_children" id="num_children" class="form-control" required>
                            </div>
                            <div class="col-lg-3">
                                <label for="ages_children">Problems w/ other births:</label>
                                <input type="text" name="ages_children" id="ages_children" class="form-control" required>
                            </div>
                        </div>
                        <div class="show_item">
                            <div>
                                <div class="form-row row" style="margin-top: 50px;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6><strong>Information</strong></h6>
                                        <a id="add_field">
                                            <i class='bx bx-list-plus btn-table btn-edit' data-tippy-content="Add New Fields" data-tippy-arrow="false"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="col-lg-3">
                                        <label for="month">Month:</label>
                                        <input type="text" name="month" id="month" class="form-control" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="date_visit">Date of visit:</label>
                                        <input type="date" name="date_visit" id="date_visit" class="form-control" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="ghmp">General Health and Minor Problems:</label>
                                        <input type="text" name="ghmp[]" id="ghmp" class="form-control" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="anemia">Anemia (How severe?):</label>
                                        <input type="text" name="anemia" id="anemia" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="col-lg-3">
                                        <label for="danger_signs">Danger Signs:</label>
                                        <input type="text" name="danger_signs[]" id="danger_signs" class="form-control" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="swelling">Swelling (where? how much?):</label>
                                        <input type="text" name="swelling[]" id="swelling" class="form-control" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="pulse">Pulse:</label>
                                        <input type="text" name="pulse" id="pulse" class="form-control" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="temp">Temp:</label>
                                        <input type="text" name="temp" id="temp" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="col-lg-3">
                                        <label for="weight">Weight (estimate or measure):</label>
                                        <input type="text" name="weight" id="weight" class="form-control" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="blood_pressure">Blood Pressure:</label>
                                        <input type="text" name="blood_pressure" id="blood_pressure" class="form-control" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="protein_urine">Protein in urine:</label>
                                        <input type="text" name="protein_urine" id="protein_urine" class="form-control" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="sugar_urine">Sugar in urine:</label>
                                        <input type="text" name="sugar_urine" id="sugar_urine" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="col-lg-3">
                                        <label for="position">Position of baby in womb:</label>
                                        <input type="text" name="position" id="position" class="form-control" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="vaccine">Tetanus vaccine:</label>
                                        <select name="vaccine" id="vaccine" class="form-select">
                                            <option value=""></option>
                                            <option value="1st">1st dose</option>
                                            <option value="2nd">2nd dose or booster</option>
                                            <option value="3rd">3rd dose</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="birth">Birth:</label>
                                        <input type="date" name="birth" id="birth" class="form-control">
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

            $(document).ready(function() {
                
                $('#add_field').on('click', function(e) {

                    $('.show_item').append('<div class="form-row row" style="margin-top: 50px;"><div><div class="d-flex justify-content-between align-items-center"><h6><strong>Information</strong></h6><a class="remove_field"><i class="bx bx-trash btn-table btn-edit" data-tippy-content="Add New Fields" data-tippy-arrow="false"></i></a></div></div><div class="form-row row"><div class="col-lg-3"><label for="month">Month:</label><input type="text" name="month" id="month" class="form-control" required></div><div class="col-lg-3"><label for="date_visit">Date of visit:</label><input type="date" name="date_visit" id="date_visit" class="form-control" required></div><div class="col-lg-3"><label for="ghmp">General Health and Minor Problems:</label><input type="text" name="ghmp[]" id="ghmp" class="form-control" required></div><div class="col-lg-3"><label for="anemia">Anemia (How severe?):</label><input type="text" name="anemia" id="anemia" class="form-control" required></div></div><div class="form-row row"><div class="col-lg-3"><label for="danger_signs">Danger Signs:</label><input type="text" name="danger_signs[]" id="danger_signs" class="form-control" required></div><div class="col-lg-3"><label for="swelling">Swelling (where? how much?):</label><input type="text" name="swelling[]" id="swelling" class="form-control" required>	</div><div class="col-lg-3"><label for="pulse">Pulse:</label><input type="text" name="pulse" id="pulse" class="form-control" required> </div><div class="col-lg-3"><label for="temp">Temp:</label><input type="text" name="temp" id="temp" class="form-control" required> </div></div><div class="form-row row"><div class="col-lg-3"><label for="weight">Weight (estimate or measure):</label><input type="text" name="weight" id="weight" class="form-control" required></div><div class="col-lg-3"><label for="blood_pressure">Blood Pressure:</label><input type="text" name="blood_pressure" id="blood_pressure" class="form-control" required></div><div class="col-lg-3"><label for="protein_urine">Protein in urine:</label><input type="text" name="protein_urine" id="protein_urine" class="form-control" required></div><div class="col-lg-3"><label for="sugar_urine">Sugar in urine:</label><input type="text" name="sugar_urine" id="sugar_urine" class="form-control" required></div></div><div class="form-row row"><div class="col-lg-3"><label for="position">Position of baby in womb:</label><input type="text" name="position" id="position" class="form-control" required></div><div class="col-lg-3"><label for="vaccine">Tetanus vaccine:</label><select name="vaccine" id="vaccine" class="form-select"><option value=""></option><option value="1st">1st dose</option><option value="2nd">2nd dose or booster</option><option value="3rd">3rd dose</option></select></div><div class="col-lg-3"><label for="birth">Birth:</label><input type="date" name="birth" id="birth" class="form-control"></div></div></div></div>');

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