<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUpdateStudant extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    public function validateFields(array $inputs)
    {
        $inputs['document'] = str_replace(['.', '-'], '', $this->request->all()['document']);
        return $inputs;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:191',
            'genre' => 'in:male,female,other',
            'document' => (!empty($this->request->all()['id']) ? 'required|max:14|unique:studants,document,' . $this->request->all()['id'] : 'required|max:14|unique:studants,document'),
            'date_of_birth' => 'required|date_format:d/m/Y',
            'zipcode' => 'required|min:8|max:9',
            'street' => 'required',
            'number' => 'required',
            'neighborhood' => 'required',
            'state' => 'required',
            'city' => 'required',
            'cell' => 'required',
        ];
    }
}
