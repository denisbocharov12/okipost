<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidationIur extends FormRequest
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
            'orgname' => 'required',
            'orgid' => 'required|unique:users,orgid',
            'orgmobile' => 'required',
            'country_iur' => 'required',
            'city_iur' => 'required',
            'email_iur' => 'email|required|unique:users,email',
            'password_iur'=>'required|min:6',
            //'password_confirmation'=>'required|min:6',
            'rule_iur' => 'required',
        ];
    }
    public function messages(){
        return [
            'orgname.required' => 'Небходимо заполнить данное поле',
            'orgid.required' => 'Небходимо заполнить данное поле',
            'orgid.unique' => 'Пользователь с таким значением уже зарегистрирован',
            'orgmobile.required' => 'Небходимо заполнить данное поле',
            'country_iur.required' => 'Поле обязательно для заполнения',
            'city_iur.required' => 'Поле обязательно для заполнения',
            'email_iur.email' => 'Email введен неверно',
            'email_iur.required' => 'Поле обязательно для заполнения',
            'email_iur.unique:users,email' => 'Такой email уже зарегистрирован',
            'password_iur.required' => 'Поле обязательно для заполнения',
            'password_iur.min:6'=> 'Пароль должен содержать не менее 6 знаков',
            'rule_iur.required' => 'Поле обязательно к согласию'
        ];
    }
}
