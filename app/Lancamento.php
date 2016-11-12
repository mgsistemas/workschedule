<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Servico;
use Mockery\CountValidator\Exception;

class Lancamento extends Model
{
    protected $table = "modulo_pr_lancamento";

    /**
     * Recupera a descricao do serviço pelo Id
     * @param $id
     */
    public static function getServico($id){
        $servico = Servico::find($id);
        return $servico->descricao;
    }

    public static function getPrestador($id){
        $prestador = Prestador::find($id);
        return $prestador->razao_social;
    }


    /**
     * Formata a data de retorno
     * retorno $object->data_servico_formatted
     *
     */
    public function getDataServicoFormattedAttribute()
    {
        return isset($this->data_servico) ? (new \DateTime($this->data_servico))->format('d/m/Y H:i:s') : "";
    }
}
