<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
{
    protected $primeryKey = 'id';
    protected $tableName = 'users';
    protected $fillable = ['name', 'phone', 'email'];
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
            'name' => 'string|required',
            'phone' => 'numeric|required|digits:9',
            'email' => 'required|email:rfc,dns',
        ];
    }
}
