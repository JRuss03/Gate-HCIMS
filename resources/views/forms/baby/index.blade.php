@extends('layouts.main')

@section('title', 'Infant Forms')

@section('content')

    @if (Session::has('message'))
        <div id="toast">
            <span class="d-flex align-items-center"><i class='bx bx-check'></i><span>{{ session('message')}}</span></span>
        </div>
    @endif

    <div class="index-contents d-flex justify-content-center">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <span class="d-flex align-items-center auth-card-header">
                        <i class='bx bxs-file'></i>
                        <h6 style="margin-top: 5px;"><strong>Infant Forms</strong></h6>
                    </span>
                </div>
                <div class="card-body">
                    <table id="pregnant-tbl" class="table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Resident</th>
                                <th>Age</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($forms as $form)
                                 @php
                                    $baby = DB::table('babies')->where('id', $form->baby_id)->first();
                                    $name = $baby->name;
                                    $age = $baby->age;
                                @endphp
                                <tr>
                                    <td class="td-content">{{ $name }}</td>
                                    <td class="td-content">{{ $age }}</td>
                                    <td>
                                        <a href="{{ route('checkup-forms.baby.show', $form->id) }}">
                                            <i class='bx bx-show btn-table btn-edit' data-tippy-content="View" data-tippy-arrow="false"></i>
                                        </a>
                                        <a href="{{ route('checkup-forms.baby.edit', $form->id) }}">
                                            <i class='bx bx-edit btn-table btn-edit' data-tippy-content="Edit" data-tippy-arrow="false"></i>
                                        </a>

                                        <a href="/checkup-forms/baby/delete/{{ $form->id }}" onclick="return confirm('Are you sure you want to delete this form?')">
                                            <i class='bx bx-trash btn-table btn-delete' data-tippy-content="Delete" data-tippy-arrow="false"></i>
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