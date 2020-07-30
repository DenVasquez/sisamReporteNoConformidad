<?php

namespace App\Http\Controllers;

use App\SisamAccordanceProcess;
use Illuminate\Http\Request;

class AccordanceProcessController extends Controller
{
    public function GetAccordanceProcess()
    {
      $SisamAccordanceProcess= SisamAccordanceProcess::all();
      $data=[];
      $data[0]=[
        'id' =>0,
        'name' =>'Seleccione',
      ];
      foreach ($SisamAccordanceProcess as $key =>$value){
          $data[$key+1] =[
              'id' =>$value->id,
              'name' =>$value->process_name,
          ];
      }
      return response ()->json($data);
    }
}
