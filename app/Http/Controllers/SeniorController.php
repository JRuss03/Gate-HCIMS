<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Baby;
use App\Models\Senior;
use App\Models\Resident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SeniorController;

class SeniorController extends Controller
{
    public function show($id)
    {
        $senior = Senior::findOrFail($id);

        return view('resident.senior.show', compact('senior'));
    }

    public function register(Request $request) {
      
        $senior = Senior::create([
            'name' => $request->input('sen_name'),
            'age' => $request->input('sen_age'),
            'birthday' =>$request->input('sen_bday'),
            'guardian' =>$request->input('sen_guardian'),
            'guardian_contact_no' =>$request->input('sen_g_number'),
            'purok' =>$request->input('sen_purok'),
            'created' => Carbon::now(),
            
        ]);
        
    
        return redirect()->route('senior.show', $senior->id)->with('message', 'New senior created');

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

        return redirect()->route('resident.index')->with('message', 'Record deleted');
    }
}
