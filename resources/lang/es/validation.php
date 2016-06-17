<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 09-07-15
 * Time: 11:06 AM
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "alpha_space"         => "El campo :attribute solo debe contener caracteres",
    "rut"                   => "El campo :attribute no es valido",
    "alpha_spaces_num"     => "El campo :attribute no es valido",
    "valid_email"          => "El campo :attribute no es valido",
    "entre1y50"            => "El campo :attribute solo puede contener hasta 50 alumnos",
    "valid_fecha"          => "El campo :attribute no es valido",

    "accepted"             => "El :attribute debe ser aceptado.",
    "active_url"           => "El :attribute no es una URL valida.",
    "after"                => "El :attribute debe ser una fecha despues de :date.",
    "alpha"                => "El :attribute solo puede contener letras.",
    "alpha_dash"           => "El :attribute solo puede contener letras, números y guiones.",
    "alpha_num"            => "El :attribute solo puede contener letras y números.",
    "array"                => "El :attribute debe ser un array.",
    "before"               => "El :attribute debe ser una fecha antes de :date.",
    "between"              => [
        "numeric" => "El :attribute debe contener entre :min y :max numeros.",
        "file"    => "El :attribute debe pesar entre :min and :max kilobytes.",
        "string"  => "El :attribute debe contener entre :min y :max caracteres.",
        "array"   => "El :attribute debe contener entre :min y :max items.",
    ],
    "boolean"              => "El :attribute debe ser Falso o Verdadero.",
    "confirmed"            => "La confirmacion del :attribute no coincide.",
    "date"                 => ":attribute no es una fecha valida.",
    "date_format"          => "El :attribute no coinciden con el formato :format.",
    "different"            => "El :attribute y :other deben ser diferentes.",
    "digits"               => "El :attribute debe ser :digits digitos.",
    "digits_between"       => "El :attribute debe contener entre :min y :max digitos.",
    "email"                => "El :attribute debe ser una direccion de E-mail valida.",
    "filled"               => "El :attribute es requerido.",
    "exists"               => "La selecion :attribute es invalida.",
    "image"                => "El :attribute debe ser una imagen.",
    "in"                   => "La selecion :attribute es invalida.",
    "integer"              => "El :attribute debe ser un entero.",
    "ip"                   => "El :attribute debe ser una direccion IP valida.",
    "max"                  => [
        "numeric" => "El :attribute no puede ser mayor que :max.",
        "file"    => "El :attribute no puede superar los :max kilobytes.",
        "string"  => "El :attribute no puede ser mayor que :max caracteres.",
        "array"   => "El :attribute no puede tener mas de :max items.",
    ],
    "mimes"                => "El :attribute debe ser un archivo de tipo: :values.",
    "min"                  => [
        "numeric" => "El :attribute debe ser por lo menos :min numeros.",
        "file"    => "El :attribute debe pesar por lo menos :min kilobytes.",
        "string"  => "El :attribute debe ser por lo menos :min caracters.",
        "array"   => "El :attribute debe ser por lo menos :min items.",
    ],
    "not_in"               => "La seleciom :attribute es invalida.",
    "numeric"              => "El :attribute debe ser un numero.",
    "regex"                => "El :attribute es un formato invalido.",
    "required"             => "se requiere el campo :attribute.",
    "required_if"          => "El :attribute requiere campo cuando :other es :value.",
    "required_with"        => "El :attribute requiere campo cuando :values esta presente.",
    "required_with_all"    => "El :attribute requiere campo cuando :values esta presente.",
    "required_without"     => "El :attribute requiere campo cuando :values no esta presente.",
    "required_without_all" => "El :attribute requiere campo cuando ningono de :values esta presente.",
    "same"                 => "El :attribute y :other deben coincidir.",
    "size"                 => [
        "numeric" => "El :attribute debe ser de tamaño :size.",
        "file"    => "El :attribute debe ser de tamaño :size kilobytes.",
        "string"  => "El :attribute debe ser de tamaño :size caracteres.",
        "array"   => "El :attribute debe contener :size items.",
    ],
    "string"               => "El :attribute debe ser un arreglo de caracteres.",
    "unique"               => "El :attribute ya esta marcado.",
    "url"                  => "El :attribute es un formato invalido.",
    "timezone"             => "El :attribute debe ser una zona(horaria) valida.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];