<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Children;
use App\Models\Pregnant;
use DB;
use Illuminate\Http\Request;

class PregnantController extends Controller
{


    public function register(Request $request)
    {

        $pregnant = Pregnant::create([
            'mother_name' => $request->input('preg_name'),
            'age' => $request->input('preg_age'),
            'numberofchildren' => $request->input('preg_num_child'),
            'mensdate' => $request->input('preg_mens_date'),
            'prob_bdate' => $request->input('preg_birth_date'),

        ]);
        //  return view('resident.add')->with('message', 'New Pregnant created');

        $preg_children = $request->preg_children;
        $preg_agechildren = $request->preg_agechildren;
        // $prob_other_birth = $request->prob_other_birth;

        $pregnant_id = $pregnant->id;

        for ($i = 0; $i < count($preg_children); $i++) {
            $datasave = [
                'pregnant_id' => $pregnant_id,
                'name' => $preg_children[$i],
                'age' => $preg_agechildren[$i],
                // 'problem' => $prob_other_birth[$i],

            ];

            DB::table('children')->insert($datasave);

        }

        $childid_id = DB::table('children')->where('pregnant_id', $pregnant_id)->get();

        $childid_id_arr = array();
        foreach ($childid_id as $childid) {
            $childid_id_arr[] = $childid->id;
        }

        $childidx = Pregnant::findOrFail($pregnant_id);
        $childidx->children = implode(',', $childid_id_arr);
        $childidx->save();
        return redirect()->route('resident.pregnant.show', $pregnant->id)->with('message', 'New Pregnant Added');
    }

}
