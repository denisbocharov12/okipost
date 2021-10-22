<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidation extends FormRequest
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
            'name_fiz' => 'required|regex:/^[a-z]+$/i',
            'surname_fiz' => 'required|regex:/^[a-z]+$/i',
            'user_id' => 'required|unique:users,user_id',
            'gender' => 'required',
            'date_fiz' => 'required',
            'country_fiz' => 'required',
            'city_fiz' => 'required',
            'phone_fiz' => 'required|min:11',
            'email_fiz' => 'email|required|unique:users,email',
            'password_fiz'=>'required|min:6',
            //'password_confirmation'=>'required|min:6',
            'rule_fiz' => 'required',
        ];
    }
    public function messages(){
        return [
            'name_fiz.required' => 'Неверное имя',
            'name_fiz.regex' => 'Необходимо ввести на латинских буквах',
            'surname_fiz.required' => 'Неверная фамилия',
            'surname_fiz.regex' => 'Необходимо ввести на латинских буквах',
            'user_id.required' => 'Поле обязательно для заполнения',
            'user_id.unique' => 'Такой номер паспорта уже зарегестрирован',
            'date_fiz.required' => 'Поле обязательно для заполнения',
            'country_fiz.required' => 'Поле обязательно для заполнения',
            'city_fiz.required' => 'Поле обязательно для заполнения',
            'phone_fiz.required' => 'Поле обязательно для заполнения',
            'phone.min:11' => 'Номер телефона неверен',
            'email_fiz.email' => 'Email введен неверно',
            'email_fiz.required' => 'Поле обязательно для заполнения',
            'email_fiz.unique' => 'Такой email уже зарегистрирован',
            'password_fiz.required' => 'Поле обязательно для заполнения',
            'password_fiz.min:6'=> 'Пароль должен содержать не менее 6 знаков',
            'rule_fiz.required' => 'Поле обязательно к согласию'
        ];
    }
}
