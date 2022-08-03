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
     * @return array<string, mixed>
     */
    public function rules()
    {
       $rules = [];
        $currentAction = $this->route()->getActionMethod();//de lay phuong thuc hien tai
        switch ($this->method()):
            case 'POST':
                switch($currentAction){
                    case 'add':
                        $rules=[
                            "email"=>"required|unique:users",
                        ];
                        default:
                        break;
                }
                break;
            default:
            break;
            endswitch;
            return $rules;

    }
    public function messages()
    {
        return [    
            'email.required'=>'khong de trong email',
            'name.required'=>'khong de trong ten',
            'password.required'=>'khong de trong pasword ',
            'email.unique'=>"Email đã tồn tại rồi ông cháu à"
        ];
    }
}
