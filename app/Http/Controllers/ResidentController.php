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

    // End of Pregnant
}
