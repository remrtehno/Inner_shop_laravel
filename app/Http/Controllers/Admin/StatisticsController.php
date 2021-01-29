<?php

namespace App\Http\Controllers\Admin;

use App\Statistics;
use App\Shops;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shops = Shops::all();
	    
        $from = null;
        $to  = null;

        if(!empty($request->all())) {
            $from    = $request->all()['from'];
            $to      = $request->all()['to'];
        }
	    
        return view("admin.statistics.index", compact('shops','to', 'from'));
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
     * @param  \App\Statistics  $statistics
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {


       
        $shops  = Shops::all();

        $from    = Carbon::parse($request->all()['date-from'])
                         ->startOfDay()        // 2018-09-29 00:00:00.000000
                         ->toDateTimeString(); // 2018-09-29 00:00:00

        $to      = Carbon::parse($request->all()['date-to'])
                         ->endOfDay()          // 2018-09-29 23:59:59.000000
                         ->toDateTimeString(); // 2018-09-29 23:59:59
	    
       $orders  = [];



        return view("admin.statistics.index", compact('shops','to', 'from'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statistics  $statistics
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistics $statistics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Statistics  $statistics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistics $statistics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statistics  $statistics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistics $statistics)
    {
        //
    }
}
