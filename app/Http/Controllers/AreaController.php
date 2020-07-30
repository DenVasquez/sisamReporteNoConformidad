<?php

namespace App\Http\Controllers;

use App\SisamArea;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function GetArea()
    {
      $SisamArea= SisamArea::all();
      $data=[];
      $data[0]=[
        'id' =>0,
        'name' =>'Seleccione',
      ];
      foreach ($SisamArea as $key =>$value){
          $data[$key+1] =[
              'id' =>$value->id,
              'name' =>$value->area_name,
          ];
      }
      return response ()->json($data);
    }
}
