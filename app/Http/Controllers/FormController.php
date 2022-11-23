<?php

namespace App\Http\Controllers;

use App\Models\Baby;
use App\Models\Senior;
use App\Models\Children;
use App\Models\Pregnant;
use App\Models\Prenatal;

use Illuminate\Http\Request;
use App\Models\PrenatalDetails;
use Illuminate\Support\Facades\DB;
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

    public function register(Request $request)
    {
        $prenatal = Prenatal::create([
            'pregnant_id' => $request->input('preg_id'),
            'last_childbirth' => $request->input('last_childbirth'),
        ]);

        $prenatal_id = $prenatal->id;

        $month = $request->month;
        $date_visit = $request->date_visit;
        $ghmp = $request->ghmp;
        $anemia = $request->anemia;
        $danger_signs = $request->danger_signs;
        $swelling = $request->swelling;
        $pulse = $request->pulse;
        $temp = $request->temp;
        $weight = $request->weight;
        $blood_pressure = $request->blood_pressure;
        $protein_urine = $request->protein_urine;
        $sugar_urine = $request->sugar_urine;
        $position = $request->position;
        $vaccine = $request->vaccine;
        $birth = $request->birth;

        $detail_uniqid = $request->detail_uniqid;

        for ($l = 0; $l < count($detail_uniqid); $l++) {
            $datasave = [
                'prenatal_id' => $prenatal_id,
                'detail_uniqid' => $detail_uniqid[$l],

                'month' => $month[$l],
                'dateofvisit' => $date_visit[$l],
                'general' => $ghmp[$l],
                'anemia' => $anemia[$l],
                'danger' => $danger_signs[$l],
                'swelling' => $swelling[$l],
                'pulse' => $pulse[$l],
                'temp' => $temp[$l],
                'weight' => $weight[$l],
                'bloodpressure' => $blood_pressure[$l],
                'proteininurine' => $protein_urine[$l],
                'sugarinurine' => $sugar_urine[$l],
                'position' => $position[$l],
                'vaccine' => $vaccine[$l],
                'birth' => $birth[$l],
            ];

            DB::table('prenatal_details')->insert($datasave);
        }

        $details = DB::table('prenatal_details')->where('prenatal_id', $prenatal_id)->get();

        $details_arr = array();

        foreach ($details as $detail) {
            $details_arr[] = $detail->id;
        }

        $getprenatal = Prenatal::findOrFail($prenatal_id);
        $getprenatal->details = implode(',', $details_arr);
        $getprenatal->name = 'Prenatal Form'. ' ' . $prenatal_id;
        $getprenatal->save();

        return redirect()->route('checkup-forms.prenatal.show', $prenatal_id);
    }

    public function prenatal_list()
    {
        $pregnant =Pregnant::all();
        return view('forms.prenatal.list', compact('pregnant'));
    }

    public function prenatal_index()
    {
        $prenatals = Prenatal::all();

        return view('forms.prenatal.index', compact('prenatals'));
    }

    public function prenatal_show($id)
    {
        $prenatal = Prenatal::findOrFail($id);

        return view('forms.prenatal.show', compact('prenatal'));
    }

    public function prenatal_edit($id)
    {
        $prenatal = Prenatal::findOrFail($id);

        $pregnant = Pregnant::findOrFail($prenatal->pregnant_id);
        
        return view('forms.prenatal.edit', compact('prenatal','pregnant'));
    }

    public function update(Request $request)
    {
        $prenatal =  Prenatal::findOrFail($request->pren_id);
        $prenatal->last_childbirth  = $request->last_childbirth;

        // Details

        $month = $request->month;
        $date_visit = $request->date_visit;
        $ghmp = $request->ghmp;
        $anemia = $request->anemia;
        $danger_signs = $request->danger_signs;
        $swelling = $request->swelling;
        $pulse = $request->pulse;
        $temp = $request->temp;
        $weight = $request->weight;
        $blood_pressure = $request->blood_pressure;
        $protein_urine = $request->protein_urine;
        $sugar_urine = $request->sugar_urine;
        $position = $request->position;
        $vaccine = $request->vaccine;
        $birth = $request->birth;

        $detail_uniqid = $request->detail_uniqid;

        for ($l = 0; $l < count($detail_uniqid); $l++) {

            PrenatalDetails::updateOrInsert(['detail_uniqid' => $detail_uniqid[$l]], 
                [
                    'prenatal_id' => $prenatal->id,
                    'detail_uniqid' => $detail_uniqid[$l],

                    'month' => $month[$l],
                    'dateofvisit' => $date_visit[$l],
                    'general' => $ghmp[$l],
                    'anemia' => $anemia[$l],
                    'danger' => $danger_signs[$l],
                    'swelling' => $swelling[$l],
                    'pulse' => $pulse[$l],
                    'temp' => $temp[$l],
                    'weight' => $weight[$l],
                    'bloodpressure' => $blood_pressure[$l],
                    'proteininurine' => $protein_urine[$l],
                    'sugarinurine' => $sugar_urine[$l],
                    'position' => $position[$l],
                    'vaccine' => $vaccine[$l],
                    'birth' => $birth[$l],
                ]
            );
        }

        $details = DB::table('prenatal_details')->where('prenatal_id', $prenatal->id)->get();

        $details_arr = array();

        foreach ($details as $detail) {
            $details_arr[] = $detail->id;
        }

        $prenatal->details = implode(',', $details_arr);
        $prenatal->name = 'Prenatal Form'. ' ' . $prenatal->id;
        $prenatal->save();

        return redirect()->route('checkup-forms.prenatal.show', $prenatal->id)->with('message', 'Updated Prenatal Details');
    }

    public function delete($id)
    {
        DB::table('prenatals')->where('id', $id)->delete();
        DB::table('prenatal_details')->where('prenatal_id', $id)->delete();

        return redirect()->back()->with('message', 'Form deleted');
    }

//senior


}
