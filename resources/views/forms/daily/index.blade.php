@extends('layouts.main')

@section('title', 'Daily Consultations')

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
                        <h6 style="margin-top: 5px;"><strong>Daily Consultations</strong></h6>
                    </span>
                </div>
                <div class="card-body">
                    <table id="pregnant-tbl" class="table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Resident</th>
                                <th>Age</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($forms as $form)
                                <tr>
                                    <td class="td-content">{{ $form->firstname }} {{ $form->middlename }} {{ $form->lastname }}</td>
                                    <td class="td-content">{{ $form->age }}</td>
                                    <td class="td-content">{{ \Carbon\Carbon::parse($form->date)->format('M. d, Y')}}</td>
                                    <td>
                                        <a href="{{ route('checkup-forms.daily.show', $form->id) }}">
                                            <i class='bx bx-show btn-table btn-edit' data-tippy-content="View" data-tippy-arrow="false"></i>
                                        </a>
                                        <a href="{{ route('checkup-forms.daily.edit', $form->id) }}">
                                            <i class='bx bx-edit btn-table btn-edit' data-tippy-content="Edit User" data-tippy-arrow="false"></i>
                                        </a>

                                        <a href="/checkup-forms/daily/delete/{{ $form->id }}" onclick="return confirm('Are you sure you want to delete this form?')">
                                            <i class='bx bx-trash btn-table btn-delete' data-tippy-content="Delete User" data-tippy-arrow="false"></i>
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