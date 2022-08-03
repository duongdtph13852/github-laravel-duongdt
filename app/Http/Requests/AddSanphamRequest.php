<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSanphamRequest extends FormRequest
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
                            "name"=>"required|unique:san_phams",
                            "price"=>"required",
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
            public function messages(){
                return [
                    'name.required'=>'khong de trong ten',
                    'price.required'=>'khong de trong giá ',
                ];
            }
}
