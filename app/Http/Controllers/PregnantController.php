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

        // Children

        $preg_children = $request->preg_children;
        $preg_agechildren = $request->preg_agechildren;
        $child_uniqid = $request->child_uniqid;

        $pregnant_id = $pregnant->id;

        for ($i = 0; $i < count($child_uniqid); $i++) {
            $datasave = [
                'pregnant_id' => $pregnant_id,
                'name' => $preg_children[$i],
                'age' => $preg_agechildren[$i],
                'child_uniqid' => $child_uniqid[$i],

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

        // Problem

        $prob_other_birth = $request->prob_other_birth;
        $prob_uniqid = $request->prob_uniqid;

        $preg_id = $pregnant->id;

        for ($p = 0; $p < count($prob_uniqid); $p++) {
            $pdatasave = [
                'pregnant_id' => $preg_id,
                'problem' => $prob_other_birth[$p],
                'prob_uniqid' => $prob_uniqid[$p],

            ];

            DB::table('problems')->insert($pdatasave);

        }

        $problems = DB::table('problems')->where('pregnant_id', $preg_id)->get();

        $problems_arr = array();
        foreach ($problems as $problem) {
            $problems_arr[] = $problem->id;
        }

        $problems = Pregnant::findOrFail($preg_id);
        $problems->problem = implode(',', $problems_arr);
        $problems->save();

        return redirect()->route('resident.pregnant.show', $pregnant->id)->with('message', 'New Pregnant Added');
    }

    public function delete($id){
        DB::table('pregnants')->where('id', $id)->delete();
        DB::table('children')->where('pregnant_id', $id)->delete();
        DB::table('problems')->where('pregnant_id', $id)->delete();
        DB::table('prenatals')->where('pregnant_id', $id)->delete();

        return redirect()->back()->with('message', 'Resident deleted');
    }

    public function update(Request $request)
    {
        $pregnant =  Pregnant::findOrFail($request->preg_id);
        $pregnant->mother_name  = $request->preg_name;
        $pregnant->age  = $request->preg_age;
        $pregnant->numberofchildren  = $request->preg_num_child;
        $pregnant->mensdate  = $request->preg_mens_date;
        $pregnant->prob_bdate  = $request->preg_birth_date;

        // Children

        $preg_children = $request->preg_children;
        $preg_agechildren = $request->preg_agechildren;
        $child_uniqid = $request->child_uniqid;

        for ($i = 0; $i < count($child_uniqid); $i++) {

            DB::table('children')->updateOrInsert(['child_uniqid' => $child_uniqid[$i]], 
                [
                    'pregnant_id' => $pregnant->id,
                    'name' => $preg_children[$i],
                    'age' => $preg_agechildren[$i],
                    'child_uniqid' => $child_uniqid[$i],
                ]
            );

        }

        $childid_id = DB::table('children')->where('pregnant_id', $pregnant->id)->get();

        $childid_id_arr = array();
        foreach ($childid_id as $childid) {
            $childid_id_arr[] = $childid->id;
        }

        $pregnant->children = implode(',', $childid_id_arr);

        // Problem

        $prob_other_birth = $request->prob_other_birth;
        $prob_uniqid = $request->prob_uniqid;

        for ($p = 0; $p < count($prob_uniqid); $p++) {

            DB::table('problems')->updateOrInsert(['prob_uniqid' => $prob_uniqid[$p]], 
                [
                    'pregnant_id' => $pregnant->id,
                    'problem' => $prob_other_birth[$p],
                    'prob_uniqid' => $prob_uniqid[$p],
                ]
            );

        }

        $problems = DB::table('problems')->where('pregnant_id', $pregnant->id)->get();

        $problems_arr = array();
        foreach ($problems as $problem) {
            $problems_arr[] = $problem->id;
        }

        $pregnant->problem = implode(',', $problems_arr);

        $pregnant->save();

        return redirect()->route('resident.pregnant.show', $pregnant->id)->with('message', 'Resident data updated');
    }

}
