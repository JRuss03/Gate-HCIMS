@extends('layouts.main')

@section('title', 'Add New Account')

@section('content')

    <div class="index-contents d-flex align-items-center justify-content-center">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <span class="d-flex align-items-center auth-card-header">
                        <i class='bx bx-user'></i>
                        <h6 style="margin-top: 5px;"><strong>Add New Account</strong></h6>
                    </span>
                </div>
                <div class="card-body">
                <form method="POST" action="{{ route('users.register') }}">
                        @csrf
                        <div class="form-row row">
                            <div class="col-lg-6 col-md-12 col-xs-12">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="col-lg-6 col-md-12 col-xs-12">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-lg-6 col-md-12 col-xs-12">
                                <label for="name">Email</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="col-lg-6 col-md-12 col-xs-12">
                                <label for="name">Position</label>
                                <select name="position" id="position" class="form-select">
                                    <option value="1">Administrator</option>
                                    <option value="2">BHW</option>
                                    <option value="3">BNS</option>
                                    <option value="4">Brgy. Official</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-lg-6 col-md-12 col-xs-12">
                                <label for="name">Password</label>
                                <input type="text" name="password" id="password" class="form-control">
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