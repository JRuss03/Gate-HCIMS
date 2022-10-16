<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('forms.index');
    }

    // Prenatal

    public function prenatal_add()
    {
        return view('forms.prenatal.add');
    }

    public function prenatal_list()
    {
        return view('forms.prenatal.list');
    }
}
