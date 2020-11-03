<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUpdateUser extends FormRequest
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
        $id = $this->segment(3);

        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'genre' => 'in:male,female,other',
            'document' => (!empty($this->request->all()['id']) ? 'required|max:20|unique:users,document,' . $this->request->all()['id'] : 'required|max:20|unique:users,document'),
            'email' => ['required', 'string', 'email', 'min:3', 'max:255', "unique:users,email,{$id},id"],
            'date_of_birth' => 'required|date_format:d/m/Y',
            'avatar' => 'required|', 
            'password' => ['required', 'string', 'min:6', 'max:16'],
            'phone' => ['required'],
        ];

        if ($this->method() == 'PUT') {
            $rules['password'] = ['nullable', 'string', 'min:6', 'max:16'];
        }

        if ($this->method() == 'PUT') {
            $rules['avatar'] = ['requerid'];
        }

        return $rules;
    }

}

