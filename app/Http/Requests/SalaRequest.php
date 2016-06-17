<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SalaRequest extends Request {

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
        switch($this->method()) {
            case 'POST':
             return [
                 'nombre' => 'required|between:3,25|alpha_space',
                 'descripcion' => 'alpha_space|between:3,255',
                 'capacidad' => 'required',
             ];
            case 'PUT':
                return [
                    'nombre' => 'required|between:3,25|alpha_space',
                    'descripcion' => 'alpha_space|between:3,255',
                    'capacidad' => 'required',
                ];
        }
	}




}
