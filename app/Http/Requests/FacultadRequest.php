<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class FacultadRequest extends Request {

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
                    'nombre' => 'required|between:3,255|alpha_space',
                    'descripcion' => 'string|between:3,255|alpha_space'
                ];
            case 'PUT':
                return [
                    'nombre' => 'required|between:3,255|alpha_space',
                    'descripcion' => 'string|between:3,255|alpha_space'
                ];
        }
	}

}
