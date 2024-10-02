<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'required|string|min:2|max:40',
            'editora' => 'required|string|min:2|max:40',
            'edicao' => 'required|integer',
            'ano_publicacao' => 'required|string|max:4',
            'preco' => 'required|min:0',
            'assuntos' => 'required',
            'autores' => 'required',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }

    /**
     * vai passar por aqui antes da validação dos dados
     */
    protected function prepareForValidation()
    {
        // Limpar a formatação da variável preco
        if ($this->preco) {
            // Remove 'R$', espaços e transforma vírgula em ponto
            $precoLimpo = preg_replace('/R\$|\s/', '', $this->preco); // Remove 'R$' e espaços
            // não pode remover ponto se não tiver vírgula
            $posicaoVirgula = strpos($precoLimpo, ',');
            if($posicaoVirgula){
                $precoLimpo = str_replace('.', '', $precoLimpo); // Remove pontos (milhares)
            }
            $precoLimpo = str_replace(',', '.', $precoLimpo); // Troca vírgula por ponto
            // Converte a string para float
            $this->merge([
                'preco' => (float)$precoLimpo,
            ]);
        }
    }

}
