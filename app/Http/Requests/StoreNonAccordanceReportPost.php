<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNonAccordanceReportPost extends FormRequest
{
    public static function myRules(){
        return[
            'user_id'=>'required',
            'report_date'=>'required',
            'source_id'=>'required',
            'area_id'=>'required',
            'process_id'=>'required',
            'report_description'=>'required',
        ];
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this -> myRules();
    }
}
