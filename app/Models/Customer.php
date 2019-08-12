<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    public $timestamps = false;
    protected $primaryKey = 'user_id';
    
    protected $fillable = [
        'cnpj', 'responsavel_nome', 'responsavel_telefone', 'responsavel_celular', 'responsavel_email',
        'responsavel2_nome', 'responsavel2_telefone', 'responsavel2_celular', 'responsavel2_email',
        'valor_cliente_parecer', 'valor_fornecedor_parecer', 'valor_cliente_negociacao', 'valor_proposto_negociacao'
        , 'valor_negociado_negociacao', 'valor_negociadoC_negociacao'
        , 'fk_id_pais', 'fk_id_regiao', 'fk_id_estado', 'fk_id_cidade', 'fk_id_bairro', 'fk_id_logradouro', 'complemento_endereco', 'numero', 'user_id'
    ];

}      