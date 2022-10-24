<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SeniorController;
use Illuminate\Http\Request;
use App\Models\Senior;
use App\Models\Baby;
use App\Models\Resident;
use DB;
class SeniorController extends Controller
{
    public function register(Request $request) {

      
        $senior = Senior::create([
            'name' => $request->input('sen_name'),
            'age' => $request->input('sen_age'),
            'birthday' =>$request->input('sen_bday'),
            'guardian' =>$request->input('sen_guardian'),
            'guardian_contact_no' =>$request->input('sen_g_number'),
            'purok' =>$request->input('sen_purok'),
            
        ]);
        
    
        return view('resident.add')->with('message', 'New senior created');
    }
    public function edit($id) {

        $senior = Senior::findOrFail($id);
    
        return view('resident.senior.edit', compact('senior',));
    }
    public function edit_store(Request $request)
    {

        
        $senior_id =  Senior::find($request->senior_id);
        $senior_id->name  = $request->sen_name;
        $senior_id->age  = $request->sen_age;
        $senior_id->birthday  = $request->sen_bday;
        $senior_id->guardian  = $request->sen_guardian;
        $senior_id->guardian_contact_no  = $request->sen_g_number;
        $senior_id->purok  = $request->sen_purok;
        
        $senior_id->save();
        $sen_id= $request->senior_id;
        $senior = Senior::findOrFail($sen_id);
        return view('resident.senior.show', compact('senior'));
        
    }
    public function delete($id){
        DB::table('seniors')->where('id', $id)->delete();
        $seniors = Senior::all();
        $babies = Baby::all();
        return view('resident.index', compact('seniors','babies'))->with('message', 'Record deleted');
    }
}
