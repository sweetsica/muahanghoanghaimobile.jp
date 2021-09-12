<?php

namespace App\Http\Controllers;

use App\Models\LinkManage;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Analytics;
use Carbon\Carbon;
use Spatie\Analytics\Period;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Visitor::latest()->take(100)->get();
        return view('back-end/visitor/manage-visitor',compact('data'));
    }

//    https://supermetrics.com/api/getFields?ds=GA&fieldType=dim
//    https://developers.google.com/analytics/devguides/reporting/data/v1/migration-api-schema-mapping#session
//    https://developers.google.com/analytics/devguides/reporting/data/v1/api-schema
    public function dashboard()
    {
        $startDate = Carbon::yesterday();
        $endDate = Carbon::now();
        $analyticsData['city'] = Analytics::performQuery(
            Period::days(7),
            'ga:sessions',
            [
                'dimensions'=>'ga:city',
                'metrics'=>'ga:sessions',
                'sort'=>'-ga:sessions',
                'max-results'=>'10'
            ]
        );
        $analyticsData['screenPageViews'] = Analytics::performQuery(
            Period::days(7),
            'ga:sessions',
            [
                'dimensions'=>'ga:PagePath',
                'metrics'=>'ga:sessions',
                'sort'=>'-ga:sessions',
                'max-results'=>'10'
            ]
        );
        $analyticsData['VisitorType'] = Analytics::performQuery(
            Period::days(1),
            'ga:sessions',
            [
                'dimensions'=>'ga:PagePath',
                'metrics'=>'ga:sessions',
                'sort'=>'-ga:sessions',
                'max-results'=>'10'
            ]
        );

        $analyticsData_VisitCount = Analytics::performQuery(
            Period::days(1),
            'ga:sessions',
            [
                'dimensions'=>'ga:VisitCount',
                'metrics'=>'ga:sessions',
                'sort'=>'-ga:sessions',
                'max-results'=>'10'
            ]
        );
        $analyticsData['VisitCount'] = $analyticsData_VisitCount['totalsForAllResults']['ga:sessions'];

        $analyticsData['top_referrers_today'] = Analytics::fetchTopReferrers(Period::days(7))->take(10);
        $analyticsData['VisitorCollect'] = LinkManage::with('ShortLink')->withCount('totalVisitors','yesterdayVisitors')->latest()->take(10)->get();
        return view('back-end/dashboard',compact('analyticsData'));
    }

    public function FilterDate(Request $dayfrom,$dayto)
    {
//        $data=Visitor::whereBetween('created_at', [$dayfrom, $dayto])->get();
//        $data_filtered ='';
//        return view('back-end/visitor/manage-visitor',compact('data_filtered'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
