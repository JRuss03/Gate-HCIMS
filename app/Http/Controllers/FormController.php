<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Baby;
use App\Models\Senior;
use App\Models\Children;
use App\Models\Pregnant;

use App\Models\Prenatal;
use App\Models\BabyCheckup;
use Illuminate\Http\Request;
use App\Models\PrenatalDetails;
use App\Models\DailyConsultation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SeniorController;
use App\Http\Controllers\PregnantController;

class FormController extends Controller
{
    public function index()
    {
        return view('forms.index');
    }

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

    // Daily Consultation

    public function daily_index()
    {
        $forms = DailyConsultation::all();

        return view('forms.daily.index', compact('forms'));
    }

    public function daily_show($id)
    {
        $form = DailyConsultation::findOrFail($id);

        return view('forms.daily.show', compact('form'));
    }

    public function daily_add()
    {
        return view('forms.daily.add');
    }

    public function daily_register(Request $request)
    {
        $form = DailyConsultation::create([
            'date' => $request->input('date'),
            'lastname' => $request->input('lastname'),
            'firstname' => $request->input('firstname'),
            'middlename' => $request->input('middlename'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'date_of_birth' => $request->input('date_of_birth'),
            'address' => $request->input('address'),
            'ht_wt' => $request->input('ht_wt'),
            'bp' => $request->input('bp'),
            'fbs' => $request->input('fbs'),
            'service_provided' => $request->input('service_provided'),
            'med_given' => $request->input('med_given')
        ]);

        return redirect()->route('checkup-forms.daily.show', $form->id);
    }

    public function daily_edit($id)
    {
        $form = DailyConsultation::findOrFail($id);

        return view('forms.daily.edit', compact('form'));
    }

    public function daily_update(Request $request)
    {
        $form =  DailyConsultation::find($request->form_id);
        $form->date  = $request->date;
        $form->lastname  = $request->lastname;
        $form->firstname  = $request->firstname;
        $form->middlename  = $request->middlename;
        $form->gender  = $request->gender;
        $form->age  = $request->age;
        $form->date_of_birth  = $request->date_of_birth;
        $form->address  = $request->address;
        $form->ht_wt  = $request->ht_wt;
        $form->bp  = $request->bp;
        $form->fbs  = $request->fbs;
        $form->service_provided  = $request->service_provided;
        $form->med_given  = $request->med_given;
        
        $form->save();

        return redirect()->route('checkup-forms.daily.show', $request->form_id);
    }
    
    public function daily_delete($id)
    {
        DB::table('daily_consultations')->where('id', $id)->delete();

        return redirect()->back()->with('message', 'Form deleted');
    }


    // Baby Checkup 

    public function baby_list()
    {
        $babies = Baby::all();
        
        return view('forms.baby.list', compact('babies'));
    }

    public function baby_index()
    {
        $forms = BabyCheckup::all();

        return view('forms.baby.index', compact('forms'));
    }

    public function baby_add($id)
    {
        $baby = Baby::findOrFail($id);

        return view('forms.baby.add', compact('baby'));
    }

    public function baby_register(Request $request)
    {
        $form = BabyCheckup::create([
            'baby_id' => $request->input('baby_id'),
            'gender' => $request->input('gender'),
            'mother_occupation' => $request->input('mother_occupation'),
            'mother_birthday' => $request->input('mother_birthday'),
            'father_occupation' => $request->input('father_occupation'),
            'father_birthday' => $request->input('father_birthday'),
            'address' => $request->input('address'),
            'cp_no' => $request->input('cp_no'),
            'birth_weight' => $request->input('birth_weight'),
            'birth_length' => $request->input('birth_length'),
            'h_circum' => $request->input('h_circum'),
            'nbs' => $request->input('nbs'),
        ]);

        // Immunization

        $form_id = $form->id;

        $immuno_uniqid = $request->immuno_uniqid;
        $immunization = $request->immunization;
        $dosage = $request->dosage;
        $reaction = $request->reaction;
        $immuno_date = $request->immuno_date;

        for ($l = 0; $l < count($immuno_uniqid); $l++) {
            $datasave = [
                'checkup_id' => $form_id,
                'immuno_uniqid' => $immuno_uniqid[$l],
                'immunization' => $immunization[$l],
                'dosage' => $dosage[$l],
                'reaction' => $reaction[$l],
                'date' => $immuno_date[$l],
            ];

            DB::table('immunizations')->insert($datasave);
        }

        $immunizations = DB::table('immunizations')->where('checkup_id', $form_id)->get();

        $immunization_arr = array();

        foreach ($immunizations as $immunization) {
            $immunization_arr[] = $immunization->id;
        }

        // Foillow up

        $uniqid = $request->uniqid;
        $date = $request->follow_date;
        $follow_weight = $request->follow_weight;
        $follow_length = $request->follow_length;
        $age_in_mos = $request->age_in_mos;
        $follow_status = $request->follow_status;
        $follow_length = $request->follow_length;
        $management = $request->management;

        for ($f = 0; $f < count($uniqid); $f++) {
            $fdatasave = [
                'checkup_id' => $form_id,
                'uniqid' => $uniqid[$f],
                'date' => $date[$f],
                'weight' => $follow_weight[$f],
                'length' => $follow_length[$f],
                'age_in_mos' => $age_in_mos[$f],
                'nutritional_status' => $follow_status[$f],
                'physical_exam' => $follow_length[$f],
                'management' => $management[$f],
            ];

            DB::table('follow_ups')->insert($fdatasave);
        }

        $followups = DB::table('follow_ups')->where('checkup_id', $form_id)->get();

        $followups_arr = array();

        foreach ($followups as $followup) {
            $followups_arr[] = $followup->id;
        }

        $getcheckup = BabyCheckup::findOrFail($form_id);
        $getcheckup->immunization = implode(',', $immunization_arr);
        $getcheckup->follow_up = implode(',', $followups_arr);
        $getcheckup->save();

        return redirect()->route('checkup-forms.baby.show', $form_id);
    }
    
    public function baby_show($id)
    {
        $form = BabyCheckup::findOrFail($id);
        $baby = baby::findOrFail($form->baby_id);

        return view('forms.baby.show', compact('form', 'baby'));
    }

    public function baby_edit($id)
    {
        $form = BabyCheckup::findOrFail($id);
        $baby = baby::findOrFail($form->baby_id);

        return view('forms.baby.edit', compact('form', 'baby'));
    }

    public function baby_update(Request $request)
    {
        $form =  BabyCheckup::find($request->form_id);
        $form->baby_id  = $request->baby_id;
        $form->gender  = $request->gender;
        $form->mother_occupation  = $request->mother_occupation;
        $form->mother_birthday  = $request->mother_birthday;
        $form->father_occupation  = $request->father_occupation;
        $form->father_birthday  = $request->father_birthday;
        $form->address  = $request->address;
        $form->cp_no  = $request->cp_no;
        $form->birth_weight  = $request->birth_weight;
        $form->birth_length  = $request->birth_length;
        $form->h_circum  = $request->h_circum;
        $form->nbs  = $request->nbs;

        // Immunization

        $immuno_uniqid = $request->immuno_uniqid;
        $immunization = $request->immunization;
        $dosage = $request->dosage;
        $reaction = $request->reaction;
        $immuno_date = $request->immuno_date;

        for ($i = 0; $i < count($immuno_uniqid); $i++) {

            DB::table('immunizations')->updateOrInsert(['immuno_uniqid' => $immuno_uniqid[$i]], 
                [
                    'checkup_id' => $request->form_id,
                    'immunization' => $immunization[$i],
                    'dosage' => $dosage[$i],
                    'reaction' => $reaction[$i],
                    'immuno_uniqid' => $immuno_uniqid[$i],
                    'date' => $immuno_date[$i],
                ]
            );

        }

        $immuno = DB::table('immunizations')->where('checkup_id', $request->form_id)->get();

        $immuno_arr = array();
        foreach ($immuno as $im) {
            $immuno_arr[] = $im->id;
        }

        $form->immunization = implode(',', $immuno_arr);

        // Follow ups

        $uniqid = $request->uniqid;
        $date = $request->follow_date;
        $follow_weight = $request->follow_weight;
        $follow_length = $request->follow_length;
        $age_in_mos = $request->age_in_mos;
        $follow_status = $request->follow_status;
        $follow_length = $request->follow_length;
        $management = $request->management;;

        for ($f = 0; $f < count($uniqid); $f++) {

            DB::table('follow_ups')->updateOrInsert(['uniqid' => $uniqid[$f]], 
                [
                    'checkup_id' => $request->form_id,
                    'date' => $date[$f],
                    'weight' => $follow_weight[$f],
                    'length' => $follow_length[$f],
                    'age_in_mos' => $age_in_mos[$f],
                    'nutritional_status' => $follow_status[$f],
                    'physical_exam' => $follow_length[$f],
                    'management' => $management[$f],
                    'uniqid' => $uniqid[$f],
                ]
            );

        }

        $follow = DB::table('follow_ups')->where('checkup_id', $request->form_id)->get();

        $follow_arr = array();
        foreach ($immuno as $flw) {
            $follow_arr[] = $flw->id;
        }

        $form->follow_up = implode(',', $follow_arr);
        
        $form->save();

        return redirect()->route('checkup-forms.baby.show', $request->form_id)->with('message', 'Updated Prenatal Details');
    }

    public function baby_delete($id)
    {
        DB::table('baby_checkups')->where('id', $id)->delete();
        DB::table('immunizations')->where('checkup_id', $id)->delete();
        DB::table('follow_ups')->where('checkup_id', $id)->delete();

        return redirect()->back()->with('message', 'Form deleted');
    }


}
