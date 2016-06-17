<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TposalaRequest extends Request {

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
                    'nombre' => 'required|alpha_space|between:3,255',
                    'descripcion' => 'alpha_space|between:3,255'
                ];
            case 'PUT':
                return [
                    'nombre' => 'required|alpha_space|between:3,255',
                    'descripcion' => 'alpha_space|between:3,255'
                ];
        }
	}

}
