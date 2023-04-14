<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'first_name'=>'required',
            'last_name'=>'required',
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
            // 'address'=>'required',
            // 'country'=>'required',
            // 'state'=>'required',
            // 'zip'=>'required',
        ];
    }

    /**
     * Return request form data
     *
     * @return array
     */
    public function formData()
    {
        return [
            'first_name' => $this->first_name ?? '',
            'last_name' => $this->last_name ?? '',
            'username' => $this->username ?? '',
            'password' => bcrypt($this->password) ?? '',
            'email' => $this->email ?? '',
            'address'=>$this->address ?? '',
            'country'=>$this->country ?? '',
            'state'=>$this->state ?? '',
            'zip'=>$this->zip ?? '',
            'status' => $this->status ?? 1,
        ];
    }
}

