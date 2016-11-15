<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicoResponsavel extends Model
{
    protected $table = 'modulo_pr_servico_responsavel';


    public static function getListaEmailResponsavel(){
        return \App\ServicoResponsavel::all();
    }

}
