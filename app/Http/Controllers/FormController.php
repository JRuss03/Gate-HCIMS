<?php

namespace App\Http\Controllers;

use App\Models\Baby;
use App\Models\Senior;
use App\Models\Children;
use App\Models\Pregnant;
use Illuminate\Http\Request;

use App\Http\Controllers\SeniorController;
use App\Http\Controllers\PregnantController;

class FormController extends Controller
{
    public function index()
    {
        return view('forms.index');
    }
    // public function index()
    // {
    //     $seniorslist =Senior::all();
    //     $babieslist =Baby::all();
    //     $pregnantlist =Pregnant::all();
    //     return view('forms.index', compact('seniors','babies','pregnant'));
    // }

    // Prenatal

    public function prenatal_add($id)
    {
        $pregnant = Pregnant::findOrFail($id);
        return view('forms.prenatal.add', compact('pregnant'));
    }

    public function prenatal_list()
    {
        $pregnant =Pregnant::all();
        return view('forms.prenatal.list', compact('pregnant'));
    }

    public function prenatal_index()
    {
        return view('forms.prenatal.index');
    }

    public function prenatal_show()
    {
        return view('forms.prenatal.show');
    }

    public function prenatal_edit()
    {
        return view('forms.prenatal.edit');
    }

//senior


}
