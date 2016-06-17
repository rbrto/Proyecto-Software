<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EstudianteRequest extends Request {

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
                    'nombres' => 'required|max:25|alpha_space',
                    'apellidos' => 'required|max:25|alpha_space',
                    'rut' => 'required|numeric',
                    'email' => 'email',
                    'carrera' => 'required'
                ];

            case 'PUT':
                return [
                    'nombres' => 'required|max:25|alpha_space',
                    'apellidos' => 'required|max:25|alpha_space',
                    'email' => 'email',
                    'carrera' => 'required'
                ];
        }
	}

}
