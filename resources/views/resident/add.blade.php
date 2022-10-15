@extends('layouts.main')

@section('title', 'Manange Account')

@section('content')

    <div class="index-contents d-flex align-items-center justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <span class="d-flex align-items-center auth-card-header">
                        <i class='bx bx-group'></i>
                        <h6 style="margin-top: 5px;"><strong>Add New Resident</strong></h6>
                    </span>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="btn-add d-flex align-items-center" id="pregnant-tab" data-bs-toggle="tab" href="#pregnant"
                                role="tab" aria-controls="other" aria-selected="false">
                                <i class='bx bxs-user-detail'></i>
                                Pregnant
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn-add d-flex align-items-center ms-2" id="senior-tab" data-bs-toggle="tab" href="#senior"
                                role="tab" aria-controls="location" aria-selected="false">
                                <i class='bx bxs-user-detail'></i>
                                Senior Citizen
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn-add d-flex align-items-center ms-2" id="baby-tab" data-bs-toggle="tab" href="#baby"
                                role="tab" aria-controls="hospital" aria-selected="false">
                                <i class='bx bxs-user-detail'></i>
                                Baby
                            </a>
                        </li>
                    </ul>
                    <div class="resident-form">
                        <div class="col-left">
                            <div class="tab-content" id="myTabContent" style="margin-top: 30px;">
        
                                {{-- Pregnant Tab --}}
        
                                <div class="tab-pane fade show active" id="pregnant" role="tabpanel" aria-labelledby="pregnant-tab">
                                    <form action="" method="POST">
                                        {{-- <h6><strong>Pregnant Registration</strong></h6> --}}
                                        <div class="form-row row">
                                            <div class="col-lg-6">
                                                <div class="row form-row">
                                                    <div class="col-lg-12">
                                                        <label for="preg_name">Name:</label>
                                                        <input type="text" name="preg_name" id="preg_name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-lg-6">
                                                        <label for="preg_age">Age:</label>
                                                        <input type="text" name="preg_age" id="preg_age" class="form-control" required>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="preg_num_child">Number of children:</label>
                                                        <input type="text" name="preg_num_child" id="preg_num_child" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-lg-6">
                                                        <label for="preg_mens_date">Last menstration date:</label>
                                                        <input type="date" name="preg_mens_date" id="preg_mens_date" class="form-control" required>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="preg_birth_date">Probable birth date:</label>
                                                        <input type="date" name="preg_birth_date" id="preg_birth_date" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="children">
                                                    <div class="form-row row">
                                                        <div class="col-lg-7">
                                                            <label for="preg_children">Name of child:</label>
                                                            <input type="text" name="preg_children[]" id="preg_children" class="preg_children form-control" required>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label for="preg_children">Age of child:</label>
                                                            <input type="text" name="preg_children[]" id="preg_children" class="form-control" required>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <button type="button" class="add_child" style="margin-top: 1.5rem; border: none; background-color: transparent; font-size: 1.3rem;">
                                                                <i class='bx bx-list-plus'></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="birth_problems">
                                                    <div class="form-row row">
                                                        <div class="col-lg-11">
                                                            <label for="prob_other_birth">Problem w/ other birth:</label>
                                                            <input type="text" name="prob_other_birth[]" id="prob_other_birth" class="form-control" required>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <button type="button" class="add_prob" style="margin-top: 1.5rem; border: none; background-color: transparent; font-size: 1.3rem;">
                                                                <i class='bx bx-list-plus'></i>
                                                            </button>
                                                        </div>
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
        
                                {{-- Senior Tab --}}
        
                                <div class="tab-pane fade show" id="senior" role="tabpanel" aria-labelledby="senior-tab">
                                    <form action="" method="POST">
                                        <div class="form-row row">
                                            <div class="col-lg-6">
                                                <div class="row form-row">
                                                    <div class="col-lg-12">
                                                        <label for="prob_other_birth">Name:</label>
                                                        <input type="text" name="sen_name" id="sen_name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-lg-12">
                                                        <label for="prob_other_birth">Guardian:</label>
                                                        <input type="text" name="sen_guardian" id="sen_guardian" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-lg-12">
                                                        <label for="prob_other_birth">Purok:</label>
                                                        <input type="text" name="sen_purok" id="sen_purok" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row form-row">
                                                    <div class="col-lg-6">
                                                        <label for="prob_other_birth">Age:</label>
                                                        <input type="text" name="sen_age" id="sen_age" class="form-control" required>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="prob_other_birth">Birthday:</label>
                                                        <input type="date" name="sen_bday" id="sen_bday" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-lg-12">
                                                        <label for="prob_other_birth">Guardian Contact Number:</label>
                                                        <input type="text" name="sen_g_number" id="sen_g_number" class="form-control" required>
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
        
                                {{-- Baby Tab --}}
        
                                <div class="tab-pane fade show" id="baby" role="tabpanel" aria-labelledby="baby-tab">
                                    <form action="" method="POST">
                                        <div class="form-row row">
                                            <div class="col-lg-6">
                                                <div class="row form-row">
                                                    <div class="col-lg-12">
                                                        <label for="prob_other_birth">Name:</label>
                                                        <input type="text" name="baby_name" id="baby_name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-lg-6">
                                                        <label for="prob_other_birth">Age:</label>
                                                        <input type="text" name="baby_age" id="baby_age" class="form-control" required>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="prob_other_birth">Birthday:</label>
                                                        <input type="text" name="baby_birthday" id="baby_birthday" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-lg-12">
                                                        <label for="prob_other_birth">Purok:</label>
                                                        <input type="text" name="baby_purok" id="baby_purok" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-lg-12">
                                                        <label for="prob_other_birth">Guardian:</label>
                                                        <input type="text" name="baby_guardian" id="baby_guardian" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row form-row">
                                                    <div class="col-lg-12">
                                                        <label for="prob_other_birth">Mother's Name:</label>
                                                        <input type="text" name="baby_m_name" id="baby_m_name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-lg-12">
                                                        <label for="prob_other_birth">Father's Name:</label>
                                                        <input type="text" name="baby_f_name" id="baby_f_name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-lg-12">
                                                        <label for="prob_other_birth">Guardian Contact Number:</label>
                                                        <input type="text" name="baby_g_number" id="baby_g_number" class="form-control">
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
                </div>
            </div>
        </div>
    </div>


    @section('page-scripts')

        <script>

            $(document).ready(function() {
                
                $('.add_child').on('click', function(e) {

                    $('.children').append('<div class="form-row row"><div class="col-lg-7"><label for="preg_children">Name of child:</label><input type="text" name="preg_children[]" id="preg_children" class="form-control" required></div><div class="col-lg-4"><label for="preg_children">Age of child:</label><input type="text" name="preg_children[]" id="preg_children" class="form-control" required></div><div class="col-lg-1"><button type="button" class="remove_field" style="margin-top: 1.5rem; border: none; background-color: transparent; font-size: 1.3rem;"><i class="bx bx-trash"></i></button></div></div>');

                });

                $('.children').on('click', '.remove_field', function(e) {
                    e.preventDefault();

                    // $('#preg_num_child').val(function(i, val) { return +val-1 });

                    let row_item = $(this).parent().parent();
                    $(row_item).remove();
                })

                $('.add_prob').on('click', function(e) {

                    $('.birth_problems').append('<div class="form-row row"><div class="col-lg-11"><label for="prob_other_birth">Problem w/ other birth:</label><input type="text" name="prob_other_birth[]" id="prob_other_birth" class="form-control" required></div><div class="col-lg-1"><button type="button" class="remove_field" style="margin-top: 1.5rem; border: none; background-color: transparent; font-size: 1.3rem;"><i class="bx bx-trash"></i></button></div></div>');

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