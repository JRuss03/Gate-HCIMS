<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PregnantController extends Controller
{
    //
    $pregnant = Pregnant::create([
        'mother_name' => $request->input('preg_name'),
        'age' => $request->input('preg_age'),
        'numberofchildren' =>$request->input('preg_num_child'),
        'mensdate' =>$request->input('preg_mens_date'),
        'prob_bdate' =>$request->input('preg_birth_date'),
      
    ]);

    //children

        $preg_children = $request->preg_children;
        $preg_agechildren = $request->preg_agechildren;
        $prob_other_birth = $request->prob_other_birth;

        for ($i = 0; $i < count($preg_children); $i++) {
            $datasave = [
                'pregnant_id' => $provider_id,
                'panel_age_limit' => $panel_age_limit[$i],
                'panel_stat_new_patients' => $panel_status[$i],
                'hearing_impared' => $hearing_impaired[$i],
              
            ];

            DB::table('provider_locations')->insert($datasave);
        }
}
