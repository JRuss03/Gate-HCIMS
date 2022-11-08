@extends('layouts.main')

@section('title', 'New Prenatal Form')

@section('content')

    <div class="index-contents d-flex justify-content-center">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <span class="d-flex align-items-center auth-card-header">
                        <i class='bx bxs-file'></i>
                        <h6 style="margin-top: 5px;"><strong>New Prenatal Form - Select Resident</strong></h6>
                    </span>
                </div>
                <div class="card-body">
                {{-- Pregnant Tab --}}
                    <table id="pregnant-tbl" class="table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Resident</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                       
                        @foreach ($pregnant as $preg)
                            <tr>
                                <td class="td-content">
                                {{ $preg->mother_name }}
                                </td>
                                <td>
                                    <a href="{{ route('checkup-forms.prenatal.add',$preg->id) }}">
                                        <i class='bx bx-check btn-table btn-edit' data-tippy-content="Select this resident" data-tippy-arrow="false"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection