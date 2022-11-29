<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RespuestasRequest extends FormRequest
{
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
        return [
            'p1'   => 'required|in:1,2,3,4,5',
            'p2'   => 'required|in:1,2,3,4,5',
            'p2'   => 'required|in:1,2,3,4,5',
            'p3'   => 'required|in:1,2,3,4,5',
            'p4'   => 'required|in:1,2,3,4,5',
            'p5'   => 'required|in:1,2,3,4,5',
            'p6'   => 'required|in:1,2,3,4,5',
            'p7'   => 'required|in:1,2,3,4,5',
            'p8'   => 'required|in:1,2,3,4,5',
            'p9'   => 'required|in:1,2,3,4,5',
            'p10'  => 'required|in:1,2,3,4,5',
            'p11'  => 'required|in:1,2,3,4,5',
            'p12'  => 'required|in:1,2,3,4,5',
            'p13'  => 'required|in:1,2,3,4,5',
            'p14'  => 'required|in:1,2,3,4,5',
            'p15'  => 'required|in:1,2,3,4,5',
            'p16'  => 'required|in:1,2,3,4,5',
            'p17'  => 'required|in:1,2,3,4,5',
            'p18'  => 'required|in:1,2,3,4,5',
            'p19'  => 'required|in:1,2,3,4,5',
            'p20'  => 'required|in:1,2,3,4,5',
            'p21'  => 'required|in:1,2,3,4,5',
            'p22'  => 'required|in:1,2,3,4,5',
            'p23'  => 'required|in:1,2,3,4,5',
            'p24'  => 'required|in:1,2,3,4,5',
            'p25'  => 'required|in:1,2,3,4,5',
            'p26'  => 'required|in:1,2,3,4,5',
            'p27'  => 'required|in:1,2,3,4,5',
            'p28'  => 'required|in:1,2,3,4,5',
            'p29'  => 'required|in:1,2,3,4,5',
            'p30'  => 'required|in:1,2,3,4,5',
            'p31'  => 'required|in:1,2,3,4,5',
            'p32'  => 'required|in:1,2,3,4,5',
            'p33'  => 'required|in:1,2,3,4,5',
            'p34'  => 'required|in:1,2,3,4,5',
            'p35'  => 'required|in:1,2,3,4,5',
        ];
    }


    public function messages(){
        return [
            'p1.required'   => 'Elije una respuesta',
            'p2.required'   => 'Elije una respuesta',
            'p2.required'   => 'Elije una respuesta',
            'p3.required'   => 'Elije una respuesta',
            'p4.required'   => 'Elije una respuesta',
            'p5.required'   => 'Elije una respuesta',
            'p6.required'   => 'Elije una respuesta',
            'p7.required'   => 'Elije una respuesta',
            'p8.required'   => 'Elije una respuesta',
            'p9.required'   => 'Elije una respuesta',
            'p10.required'  => 'Elije una respuesta',
            'p11.required'  => 'Elije una respuesta',
            'p12.required'  => 'Elije una respuesta',
            'p13.required'  => 'Elije una respuesta',
            'p14.required'  => 'Elije una respuesta',
            'p15.required'  => 'Elije una respuesta',
            'p16.required'  => 'Elije una respuesta',
            'p17.required'  => 'Elije una respuesta',
            'p18.required'  => 'Elije una respuesta',
            'p19.required'  => 'Elije una respuesta',
            'p20.required'  => 'Elije una respuesta',
            'p21.required'  => 'Elije una respuesta',
            'p22.required'  => 'Elije una respuesta',
            'p23.required'  => 'Elije una respuesta',
            'p24.required'  => 'Elije una respuesta',
            'p25.required'  => 'Elije una respuesta',
            'p26.required'  => 'Elije una respuesta',
            'p27.required'  => 'Elije una respuesta',
            'p28.required'  => 'Elije una respuesta',
            'p29.required'  => 'Elije una respuesta',
            'p30.required'  => 'Elije una respuesta',
            'p31.required'  => 'Elije una respuesta',
            'p32.required'  => 'Elije una respuesta',
            'p33.required'  => 'Elije una respuesta',
            'p34.required'  => 'Elije una respuesta',
            'p35.required'  => 'Elije una respuesta',
        ];
        

    }






}
