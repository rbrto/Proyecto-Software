<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CampusRequest extends Request {

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
                    'direccion' => 'required|between:3,80',
                    'latitud' => 'required|numeric',
                    'longitud' => 'required|numeric',
                    'encargado' => 'required',
                    'descripcion' => 'between:3,500|alpha_space'
                ];
            case 'PUT': {
                return [
                    'nombre' => 'required|between:3,25|alpha_space',
                    'direccion' => 'required|between:3,80',
                    'latitud' => 'required|numeric',
                    'longitud' => 'required|numeric',
                    'encargado' => 'required',
                    'descripcion' => 'between:3,500|alpha_space'
                ];
            }
        }
	}

}
