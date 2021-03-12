<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class LearningActivityRequest extends FormRequest
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
            'method_id' => 'required|numeric',
            'start_date' => 'required|date',
            'activity' => 'required',
            'end_date' => 'required|date|after:start_date'
        ];
    }


    protected function getValidatorInstance()
    {
        if ($this->request->has('staydate')) {
            $stayDate = array_map('trim', explode('-', $this->request->get('staydate')));
            $this->merge([
                'start_date' => Carbon::parse($stayDate[0])->format('Y-m-d H:i:s'),
                'end_date' => Carbon::parse($stayDate[1])->format('Y-m-d H:i:s')
            ]);

        }
        return parent::getValidatorInstance();
    }
}
