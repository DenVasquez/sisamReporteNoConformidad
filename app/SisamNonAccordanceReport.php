<?php

namespace App;

use App\User;
use App\SisamNonAccordanceSources;
use App\SisamArea;
use App\SisamAccordanceProcess;
use Illuminate\Database\Eloquent\Model;


class SisamNonAccordanceReport extends Model
{
    protected $fillable = [
                           'user_id',
                           'source_id',
                           'report_date',
                           'area_id',
                           'process_id',
                           'report_description',
                           ];

     public function user(){
      return $this->belongsTo(User::class);
     }
     public function source(){
        return $this->belongsTo(SisamNonAccordanceSources::class);
       }
    public function area(){
        return $this->belongsTo(SisamArea::class);
       }
    public function process(){
        return $this->belongsTo(SisamAccordanceProcess::class);
       }

}
