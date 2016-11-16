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

    public static function getDescricaoSituacao($situacao)
    {
        $retorno = "Aberto";
        switch ($situacao){
            case 'PDP' : $retorno = 'Em Digitação'; break;
            case 'ENP' : $retorno = 'Enviado'; break;
            case 'DPP' : $retorno = 'Devolvido'; break;
            case 'APP' : $retorno = 'Aprovado' ; break;
            case 'ENF' : $retorno = 'Aguardando lote' ; break;
            case 'LOT' : $retorno = 'Em Lote' ; break;
            case 'DPA' : $retorno = 'Devolvido para análise' ; break;
            case 'PRV' : $retorno = 'Provisionado' ; break;
            case 'CAN' : $retorno = 'Cancelado' ; break;
        }

        return $retorno;
    }
}
