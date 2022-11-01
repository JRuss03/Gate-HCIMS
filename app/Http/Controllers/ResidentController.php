<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregnant;
use App\Models\Senior;
use App\Models\Children;
use App\Models\Baby;
use App\Http\Controllers\SeniorController;
use App\Http\Controllers\PregnantController;
class ResidentController extends Controller
{
    public function index()
    {
        $seniors =Senior::all();
        $babies =Baby::all();
        $pregnant =Pregnant::all();
        return view('resident.index', compact('seniors','babies','pregnant'));
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

    // Senior

    public function senior_show($id)
    {
        $senior = Senior::findOrFail($id);
        return view('resident.senior.show', compact('senior'));
    }


    // End of Senior

    // Baby

    public function baby_show($id)
    {
        $baby = Baby::findOrFail($id);
        return view('resident.baby.show', compact('baby'));
    }


    // End of Baby
}
