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
              
                    <form action="{{ route('checkup-forms.prenatal.register') }}" method="POST">
                        @csrf
                        <div class="form-row row">

                            @php
                                // use DB;

                                $children = DB::table('children')->where('pregnant_id', $pregnant->id)->get();
                                
                                $age_arr = array();

                                foreach ($children as $child) {
                                    $age_arr[] = $child->age;
                                }

                                $ages = implode(',', $age_arr);

                                // use Illuminate\Support\Facades\DB;
        
                                $problems = DB::table('problems')->where('pregnant_id', $pregnant->id)->get();
                            @endphp

                            <div class="col-lg-3">
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
                            </div>
                            <div class="col-lg-3">
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
                            <div class="col-lg-3">
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
                            <div class="col-lg-3">
                                <div class="form-row row">
                                    <label for="name">Date of last childbirth:</label>
                                    <input type="date" name="last_childbirth" id="last_childbirth" class="form-control">
                                    <input type="hidden" name="preg_id" id="preg_id" value="{{ old('preg_id', $pregnant->id) }}">
                                </div>
                            </div>
                        </div>
                     
                        <div class="show_item">
                            <div>
                                <div class="form-row row" style="margin-top: 50px;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6><strong>Information</strong></h6>
                                        <a id="add_field" onclick="ChildbuttonClick()">
                                            <i class='bx bx-list-plus btn-table btn-edit' data-tippy-content="Add New Fields" data-tippy-arrow="false"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="col-lg-3">
                                        <label for="month">Month:</label>
                                        <select name="month[]" id="month" class="form-select">
                                            <option value=""></option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                        <input type="hidden" id="detail_id" value="0">
                                        <input type="hidden" name="detail_uniqid[]" id="detail_uniqid">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="date_visit">Date of visit:</label>
                                        <input type="date" name="date_visit[]" id="date_visit" class="form-control" >
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="ghmp">General Health and Minor Problems:</label>
                                        <input type="text" name="ghmp[]" id="ghmp" class="form-control" >
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="anemia">Anemia (How severe?):</label>
                                        <input type="text" name="anemia[]" id="anemia" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="col-lg-3">
                                        <label for="danger_signs">Danger Signs:</label>
                                        <input type="text" name="danger_signs[]" id="danger_signs" class="form-control" >
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="swelling">Swelling (where? how much?):</label>
                                        <input type="text" name="swelling[]" id="swelling" class="form-control" >
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="pulse">Pulse:</label>
                                        <input type="text" name="pulse[]" id="pulse" class="form-control" >
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="temp">Temp:</label>
                                        <input type="text" name="temp[]" id="temp" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="col-lg-3">
                                        <label for="weight">Weight (estimate or measure):</label>
                                        <input type="text" name="weight[]" id="weight" class="form-control" >
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="blood_pressure">Blood Pressure:</label>
                                        <input type="text" name="blood_pressure[]" id="blood_pressure" class="form-control" >
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="protein_urine">Protein in urine:</label>
                                        <input type="text" name="protein_urine[]" id="protein_urine" class="form-control" >
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="sugar_urine">Sugar in urine:</label>
                                        <input type="text" name="sugar_urine[]" id="sugar_urine" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="col-lg-3">
                                        <label for="position">Position of baby in womb:</label>
                                        <input type="text" name="position[]" id="position" class="form-control" >
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="vaccine">Tetanus vaccine:</label>
                                        <select name="vaccine[]" id="vaccine" class="form-select">
                                            <option value=""></option>
                                            <option value="n/a">n/a</option>
                                            <option value="1st">1st dose</option>
                                            <option value="2nd">2nd dose or booster</option>
                                            <option value="3rd">3rd dose</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="birth">Birth:</label>
                                        <input type="date" name="birth[]" id="birth" class="form-control">
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