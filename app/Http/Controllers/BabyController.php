<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Baby;
use App\Models\Senior;
use App\Models\Resident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BabyController extends Controller
{
    public function show($id)
    {
        $baby = Baby::findOrFail($id);

        return view('resident.baby.show', compact('baby'));
    }

    public function register(Request $request) {
    $baby = Baby::create([
        'name' => $request->input('baby_name'),
        'age' => $request->input('baby_age'),
        'birthday' =>$request->input('baby_bday'),
        'mother_name' =>$request->input('baby_m_name'), 
        'father_name' =>$request->input('baby_f_name'),
        'guardian' =>$request->input('baby_guardian'),
        'guardian_contact_no' =>$request->input('baby_g_number'),
        'purok' =>$request->input('baby_purok'),
        'created' => Carbon::now(),
        
    ]);

    return redirect()->route('baby.show', $baby->id)->with('message', 'New record created');
    
    }
    public function edit($id) {

        $baby = Baby::findOrFail($id);

        return view('resident.baby.edit', compact('baby',));
    }

    public function edit_store(Request $request)
    {
        $baby_id =  Baby::find($request->baby_id);
        $baby_id->name  = $request->baby_name;
        $baby_id->age  = $request->baby_age;
        $baby_id->birthday  = $request->baby_bday;
        $baby_id->mother_name  = $request->baby_m_name;
        $baby_id->father_name  = $request->baby_f_name;
        $baby_id->guardian  = $request->baby_guardian;
        $baby_id->guardian_contact_no  = $request->baby_g_number;
        $baby_id->purok  = $request->baby_purok;
        
        $baby_id->save();
        
        // $baby_id = $request->baby_id;

        // $baby = Baby::findOrFail($baby_id);

        // return view('resident.baby.show', compact('baby'));
        return redirect()->route('baby.show', $request->baby_id);
        
    }

    public function delete($id){
        DB::table('babies')->where('id', $id)->delete();

        return view('resident.index')->with('message', 'Record deleted');
    }
}
