<?php

namespace App\Http\Controllers;

use App\SisamNonAccordanceSources;
use Illuminate\Http\Request;

class NonAccordanceSourcesController extends Controller
{
    public function GetNonAccordanceSource()
    {
      $SisamNonAccordanceSources= SisamNonAccordanceSources::all();
      $data=[];
      $data[0]=[
        'id' =>0,
        'source' =>'Seleccione',
      ];
      foreach ($SisamNonAccordanceSources as $key =>$value){
          $data[$key+1] =[
              'id' =>$value->id,
              'source' =>$value->sources_name,
          ];
      }
      return response ()->json($data);
    }

}
