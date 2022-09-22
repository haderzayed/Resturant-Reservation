<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenueRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
            return $this->createRules();
        } else {
            return $this->updateRules();
        }
    }
    public function createRules()
    {
        return [
            'name'=>['required'],
            'price'=>['required'],
            'description'=>['required'],
            'image'=>['required'],
            'categories'=>['required'],
        ];
    }

    public function updateRules()
    {
        return [
            'name'=>['required'],
            'price'=>['required'],
            'description'=>['required'],
            'categories'=>['required'],

        ];
    }
}
