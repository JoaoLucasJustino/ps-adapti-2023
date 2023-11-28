<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class alunoRequest extends FormRequest
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
      'nome' => ['required', 'string'],
      'decricao' => ['nullable', 'max:3000'],
      'contratado' => ['nullable', 'boolean'],
      'formado' => ['nullable', 'boolean'],
      'curso_id' => ['required'],
      'imagem' => ['image']
    ];
  }

  public function messages()
  {
    return [
      'nome.required' => "O campo precisa ser informado",
      'nome.max' => "O campo deve ter no máximo 100 caracteres",
      'descricao.max' => "O campo deve ter no máximo 3000 caracteres",
      'imagem.image' => "A imagem precisa ser dos tipos PNG, JPEG, JPG, etc..."
    ];
  }
}
