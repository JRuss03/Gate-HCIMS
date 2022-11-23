
@extends('layouts.main')

@section('title', 'Edit Details - Juana Dela Cruz')

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
                    <form action="{{ route('pregnant.update') }}" method="POST">
                        @csrf
                        {{-- <h6><strong>Pregnant Registration</strong></h6> --}}
                        <div class="form-row row">
                            <div class="col-lg-6">
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="preg_name">Name:</label>
                                        <input type="text" name="preg_name" id="preg_name" class="form-control" value="{{ old('mother_name', $pregnant->mother_name) }}" required>
                                        <input type="hidden" name="preg_id" id="preg_id" class="form-control" value="{{ old('id', $pregnant->id) }}" >
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="preg_age">Age:</label>
                                        <input type="text" name="preg_age" id="preg_age" class="form-control" value="{{ old('age', $pregnant->age) }}" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="preg_num_child">Number of children:</label>
                                        <input type="text" name="preg_num_child" id="preg_num_child" value="{{ old('numberofchildren', $pregnant->numberofchildren) }}" class="form-control" value="1">
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="preg_mens_date">Last menstruation date:</label>
                                        <input type="date" name="preg_mens_date" id="preg_mens_date" value="{{ old('mensdate', $pregnant->mensdate) }}" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="preg_birth_date">Probable birth date:</label>
                                        <input type="date" name="preg_birth_date" id="preg_birth_date" value="{{ old('prob_bdate', $pregnant->prob_bdate) }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            @php
                                // use DB;

                                $children = DB::table('children')->where('pregnant_id', $pregnant->id)->get();
                                $child_arr = array();
                                foreach ($children as $child) {
                                    $child_arr[] = $child;
                                }

                                $problems = DB::table('problems')->where('pregnant_id', $pregnant->id)->get();
                                $prob_arr = array();
                                foreach ($problems as $problem) {
                                    $prob_arr[] = $problem;
                                }

                            @endphp

                            <div class="col-lg-6">
                                <div class="children">
                                    <div class="form-row row">
                                        <div class="col-lg-11"><h6 style="margin-top: 30px;"><strong>Children</strong></h6></div>
                                        <div class="col-lg-1">
                                            <button type="button" class="add_child" onclick="ChildbuttonClick()" style="margin-top: 1.5rem; border: none; background-color: transparent; font-size: 1.3rem;">
                                                <i class='bx bx-list-plus'></i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    @foreach ($child_arr as $ch)
                                        <div class="form-row row">
                                            <div class="col-lg-7">
                                                <label for="preg_children">Name of child:</label>
                                                <input type="text" name="preg_children[]" id="preg_children" value="{{ old('preg_children', $ch->name) }}" class="preg_children form-control">
                                                <input type="hidden" id="child_id" value="0">
                                                <input type="hidden" name="child_uniqid[]" id="child_uniqid" value="{{ old('child_uniqid', $ch->child_uniqid) }}">
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="preg_children">Age of child:</label>
                                                <input type="text" name="preg_agechildren[]" id="preg_agechildren" value="{{ old('preg_agechildren', $ch->age) }}" class="form-control">
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="birth_problems">
                                    <div class="form-row row">
                                        <div class="col-lg-11"><h6 style="margin-top: 30px;"><strong>Problems</strong></h6></div>
                                        <div class="col-lg-1">
                                            <button type="button" class="add_prob" onclick="buttonClick()" style="margin-top: 1.5rem; border: none; background-color: transparent; font-size: 1.3rem;">
                                                <i class='bx bx-list-plus'></i>
                                            </button>
                                        </div>
                                    </div>
                                    @foreach ($prob_arr as $prob)
                                        <div class="form-row row">
                                            <div class="col-lg-11">
                                                <label for="prob_other_birth">Problem w/ other birth:</label>
                                                <input type="text" name="prob_other_birth[]" id="prob_other_birth" value="{{ old('prob_other_birth', $prob->problem) }}" class="form-control">
                                                <input type="hidden" id="prob_id" value="0">
                                                <input type="hidden" name="prob_uniqid[]" id="prob_uniqid" value="{{ old('prob_uniqid', $prob->prob_uniqid) }}">
                                            </div>
                                        </div>
                                    @endforeach
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
            function ChildbuttonClick() {
                document.getElementById('child_id').value = ++i;
            }
        
        </script>

        <script>
            var i = 0;
            function buttonClick() {
                document.getElementById('prob_id').value = ++i;
            }

        </script>

        <script type="module">
            import { v4 as uuidv4 } from 'https://jspm.dev/uuid';

            $(document).ready(function() {
                
                $('.add_child').on('click', function(e) {
                    let child_id = $('#child_id').val();

                    $('.children').append('<div class="form-row row"><div class="col-lg-7"><label for="preg_children">Name of child:</label><input type="text" name="preg_children[]" id="preg_children'+ child_id +'" class="form-control"></div><div class="col-lg-4"><label for="preg_children">Age of child:</label><input type="text" name="preg_agechildren[]" id="preg_children'+ child_id +'" class="form-control"><input type="hidden" name="child_uniqid[]" id="child_uniqid'+ child_id +'"></div><div class="col-lg-1"><button type="button" class="remove_field" style="margin-top: 1.5rem; border: none; background-color: transparent; font-size: 1.3rem;"><i class="bx bx-trash"></i></button></div></div>');
                    $('#preg_num_child').val(function(i, val) { return +val+1 });

                    $('#child_uniqid' + child_id).val(uuidv4());
                });

                $('.children').on('click', '.remove_field', function(e) {
                    e.preventDefault();

                    $('#preg_num_child').val(function(i, val) { return +val-1 });

                    let row_item = $(this).parent().parent();
                    $(row_item).remove();
                })

                $('.add_prob').on('click', function(e) {
                    let prob_id = $('#prob_id').val();

                    $('.birth_problems').append('<div class="form-row row"><div class="col-lg-11"><label for="prob_other_birth">Problem w/ other birth:</label><input type="text" name="prob_other_birth[]" id="prob_other_birth'+ prob_id +'" class="form-control"><input type="hidden" name="prob_uniqid[]" id="prob_uniqid'+ prob_id +'"></div><div class="col-lg-1"><button type="button" class="remove_field" style="margin-top: 1.5rem; border: none; background-color: transparent; font-size: 1.3rem;"><i class="bx bx-trash"></i></button></div></div>');

                    $('#prob_uniqid' + prob_id).val(uuidv4());
                });

                $('.birth_problems').on('click', '.remove_field', function(e) {
                    e.preventDefault();
                    let row_item = $(this).parent().parent();
                    $(row_item).remove();
                });

            });
            
        </script>
        
    @endsection
    
@endsection