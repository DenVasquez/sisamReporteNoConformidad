<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SisamNonAccordanceReport;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreNonAccordanceReportPost;
use Illuminate\Auth\Events\Validated;

class NonAccordanceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SisamNonAccordanceReports = SisamNonAccordanceReport::
        join('sisam_users','sisam_users.id','=','sisam_non_accordance_reports.user_id')->
        join('sisam_non_accordance_sources','sisam_non_accordance_sources.id','=','sisam_non_accordance_reports.source_id')->
        join('sisam_areas','sisam_areas.id','=','sisam_non_accordance_reports.area_id')->
        join('sisam_accordance_processes','sisam_accordance_processes.id','=','sisam_non_accordance_reports.process_id')->
        select('sisam_non_accordance_reports.*','sisam_users.user_name','sisam_users.user_first_name','sisam_users.user_last_name',
                                                'sisam_non_accordance_sources.sources_name',
                                                'sisam_areas.area_name',
                                                'sisam_accordance_processes.process_name')->
       orderBy('sisam_non_accordance_reports.id','desc')->paginate(5);

         return response()->json($SisamNonAccordanceReports);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $validator = Validator::make($request->all(), StoreNonAccordanceReportPost::myRules());

        if ($validator->fails()){
            return "Existen Errores";
        }else{
            //dd($validator->validated());
          SisamNonAccordanceReport::create($validator->validated());
          return "insertado con éxito";
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NonAccordanceReport  $nonAccordanceReport
     * @return \Illuminate\Http\Response
     */
    public function show(SisamNonAccordanceReport $SisamNonAccordanceReport)
    {
    $SisamNonAccordanceReport->user;
    $SisamNonAccordanceReport->area;
    $SisamNonAccordanceReport->source;
    $SisamNonAccordanceReport->process;

      return response()->json($SisamNonAccordanceReport);

       //dd($SisamNonAccordanceReport->user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NonAccordanceReport  $nonAccordanceReport
     * @return \Illuminate\Http\Response
     */
    public function edit(SisamNonAccordanceReport $SisamNonAccordanceReport)
    {
      //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NonAccordanceReport  $nonAccordanceReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SisamNonAccordanceReport $SisamNonAccordanceReport)
    {
        $SisamNonAccordanceReport->update($request -> all());

        return response()->json(['message'=>'actualizado con éxito'],204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NonAccordanceReport  $nonAccordanceReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(SisamNonAccordanceReport $SisamNonAccordanceReport)
    {
        $SisamNonAccordanceReport->delete();

        return response()->json(['message'=>'eliminado con éxito'],204);
    }
}
