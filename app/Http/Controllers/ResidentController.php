<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResidentController extends Controller
{
    public function index()
    {
        return view('resident.index');
    }

    public function add()
    {
        return view('resident.add');
    }

    // Pregnant

    public function pregnant_show()
    {
        return view('resident.pregnant.show');
    }

    public function pregnant_edit()
    {
        return view('resident.pregnant.edit');
    }

    // End of Pregnant

    // Senior

    public function senior_show()
    {
        return view('resident.senior.show');
    }

    public function senior_edit()
    {
        return view('resident.senior.edit');
    }

    // End of Senior

    // Baby

    public function baby_show()
    {
        return view('resident.baby.show');
    }

    public function baby_edit()
    {
        return view('resident.baby.edit');
    }

    // End of Baby
}
