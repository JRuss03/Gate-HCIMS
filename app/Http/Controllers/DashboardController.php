<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Baby;
use App\Models\Senior;
use App\Models\Pregnant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $pregnantCount = Pregnant::all();
        $babyCount = Baby::all();
        $seniorCount = Senior::all();

        $yearNow = Carbon::now()->year;

        // Years Pregnant
        $pregYears = Pregnant::select(\DB::raw("COUNT(*) as count"), \DB::raw("YEAR(created) as year"), \DB::raw("max(created) as created_At"))
        ->groupBy('year')
        ->orderBy('created_At')
        ->pluck('year');

        $seniorYears = Senior::select(\DB::raw("COUNT(*) as count"), \DB::raw("YEAR(created) as year"), \DB::raw("max(created) as created_At"))
        ->groupBy('year')
        ->orderBy('created_At')
        ->pluck('year');

        $babyYears = Baby::select(\DB::raw("COUNT(*) as count"), \DB::raw("YEAR(created) as year"), \DB::raw("max(created) as created_At"))
        ->groupBy('year')
        ->orderBy('created_At')
        ->pluck('year');
        
        // Pregnant Chart
        $pregData = Pregnant::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created) as monthname"), \DB::raw("max(created) as created_At"))
        ->where(DB::raw("YEAR(created)"), "=", $yearNow)
        ->groupBy('monthname')
        ->orderBy('created_At')
        ->get();

        $pregDataArray = [];

        foreach ($pregData as $pdata) {
            $pregDataArray['label'][] = $pdata->monthname;
            $pregDataArray['data'][] = (int) $pdata->count;
        }

        $pregDataArray['chart_data'] = json_encode($pregDataArray);

        // Senior Chart
        $seniorData = Senior::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created) as monthname"), \DB::raw("max(created) as created_At"))
        ->where(DB::raw("YEAR(created)"), "=", $yearNow)
        ->groupBy('monthname')
        ->orderBy('created_At')
        ->get();

        $seniorDataArray = [];

        foreach ($seniorData as $sdata) {
            $seniorDataArray['label'][] = $sdata->monthname;
            $seniorDataArray['data'][] = (int) $sdata->count;
        }

        $seniorDataArray['chart_data'] = json_encode($seniorDataArray);

        // Baby Chart
        $babyData = Baby::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created) as monthname"), \DB::raw("max(created) as created_At"))
        ->where(DB::raw("YEAR(created)"), "=", $yearNow)
        ->groupBy('monthname')
        ->orderBy('created_At')
        ->get();

        $babyDataArray = [];

        foreach ($babyData as $bdata) {
            $babyDataArray['label'][] = $bdata->monthname;
            $babyDataArray['data'][] = (int) $bdata->count;
        }

        $babyDataArray['chart_data'] = json_encode($babyDataArray);

        return view('dashboard',['pregData' => $pregDataArray, 'seniorData' => $seniorDataArray, 'babyData' => $babyDataArray], compact('pregnantCount', 'babyCount', 'seniorCount', 'pregYears', 'seniorYears', 'babyYears'));
    }

    public function getPregYear($year)
    {
        $pregData = Pregnant::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created) as monthname"), \DB::raw("max(created) as created_At"))
        ->where(DB::raw("YEAR(created)"), "=", $year)
        ->groupBy('monthname')
        ->orderBy('created_At')
        ->get();

        $pregDataArray = [];

        foreach ($pregData as $pdata) {
            $pregDataArray['label'][] = $pdata->monthname;
            $pregDataArray['data'][] = (int) $pdata->count;
        }

        return response()->json(['data'=>$pregDataArray]);
    }

    public function getSeniorYear($year)
    {
        $seniorData = Senior::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created) as monthname"), \DB::raw("max(created) as created_At"))
        ->where(DB::raw("YEAR(created)"), "=", $year)
        ->groupBy('monthname')
        ->orderBy('created_At')
        ->get();

        $seniorDataArray = [];

        foreach ($seniorData as $sdata) {
            $seniorDataArray['label'][] = $sdata->monthname;
            $seniorDataArray['data'][] = (int) $sdata->count;
        }

        $seniorDataArray['chart_data'] = json_encode($seniorDataArray);

        return response()->json(['data'=>$seniorDataArray]);
    }

    public function getBabyYear($year)
    {
        $babyData = Baby::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created) as monthname"), \DB::raw("max(created) as created_At"))
        ->where(DB::raw("YEAR(created)"), "=", $year)
        ->groupBy('monthname')
        ->orderBy('created_At')
        ->get();

        $babyDataArray = [];

        foreach ($babyData as $bdata) {
            $babyDataArray['label'][] = $bdata->monthname;
            $babyDataArray['data'][] = (int) $bdata->count;
        }

        $babyDataArray['chart_data'] = json_encode($babyDataArray);

        return response()->json(['data'=>$babyDataArray]);
    }

    public function pregFilter(Request $request)
    {
        $year = $request->year;
        $start = $request->start;
        $end = $request->end;
        $month = $request->month;

        $pregData = Pregnant::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAY(created) as day"), \DB::raw("max(created) as created_At"))
        ->where(DB::raw("YEAR(created)"), "=", $year)
        ->where(DB::raw("MONTHNAME(created)"), "=", $month)
        ->whereBetween(DB::raw("DAY(created)"), [$start, $end])
        ->groupBy('day')
        ->orderBy('created_At')
        ->get();

        $pregDataArray = [];

        foreach ($pregData as $pdata) {
            $pregDataArray['label'][] = $pdata->day;
            $pregDataArray['data'][] = (int) $pdata->count;
        }

        return response()->json(['data'=>$pregDataArray]);
    }

    public function seniorFilter(Request $request)
    {
        $year = $request->year;
        $start = $request->start;
        $end = $request->end;
        $month = $request->month;

        $seniorData = Senior::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAY(created) as day"), \DB::raw("max(created) as created_At"))
        ->where(DB::raw("YEAR(created)"), "=", $year)
        ->where(DB::raw("MONTHNAME(created)"), "=", $month)
        ->whereBetween(DB::raw("DAY(created)"), [$start, $end])
        ->groupBy('day')
        ->orderBy('created_At')
        ->get();

        $seniorDataArray = [];

        foreach ($seniorData as $sdata) {
            $seniorDataArray['label'][] = $sdata->day;
            $seniorDataArray['data'][] = (int) $sdata->count;
        }

        $seniorDataArray['chart_data'] = json_encode($seniorDataArray);

        return response()->json(['data'=>$seniorDataArray]);
    }

    public function babyFilter(Request $request)
    {
        $year = $request->year;
        $start = $request->start;
        $end = $request->end;
        $month = $request->month;

        $babyData = Baby::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAY(created) as day"), \DB::raw("max(created) as created_At"))
        ->where(DB::raw("YEAR(created)"), "=", $year)
        ->where(DB::raw("MONTHNAME(created)"), "=", $month)
        ->whereBetween(DB::raw("DAY(created)"), [$start, $end])
        ->groupBy('day')
        ->orderBy('created_At')
        ->get();

        $babyDataArray = [];

        foreach ($babyData as $bdata) {
            $babyDataArray['label'][] = $bdata->day;
            $babyDataArray['data'][] = (int) $bdata->count;
        }

        $babyDataArray['chart_data'] = json_encode($babyDataArray);

        return response()->json(['data'=>$babyDataArray]);
    }
}
