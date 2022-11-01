<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Senior;
use App\Models\Baby;
use App\Models\Pregnant;
use App\Models\Resident;
use DB;

class PregnantController extends Controller
{
    //
    public function register (Request $request){ 

        $pregnant = Pregnant::create([
            'mother_name' => $request->input('preg_name'),
            'age' => $request->input('preg_age'),
            'numberofchildren' =>$request->input('preg_num_child'),
            'mensdate' =>$request->input('preg_mens_date'),
            'prob_bdate' =>$request->input('preg_birth_date'),
        
        ]);
        $preg_children = $request->preg_children;
        $preg_agechildren = $request->preg_agechildren;
        $prob_other_birth = $request->prob_other_birth;
        $pregnant_id =  $pregnant->id;
        for ($i = 0; $i < count($prob_other_birth); $i++) {
            $datasave = [
                'pregnant_id' => $pregnant_id,
                'name' => $preg_children[$i],
                'age' => $preg_agechildren[$i],
                'problem' => $prob_other_birth[$i],
            
            ];

            DB::table('children')->insert($datasave);
        }
        
        $prob_id = DB::table('children')->where('pregnant_id', $pregnant_id)->get();

            $prob_id_arr = array();

            foreach ($prob_id as $prob) {
                $prob_id_arr[] = $prob->id;
            }

            $childid = Pregnant::findOrFail($pregnant_id);
            $childid->prob_id = implode(',', $prob_id_arr);
            $childid->save();
            return redirect()->route('resident.pregnant.show', $pregnant->id)->with('message', 'New Pregnant Added');
            
        }
       
   
    
}
