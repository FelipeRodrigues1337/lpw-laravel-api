<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Registro extends Model
{
    protected $primaryKey='id_registro';
    protected $fillable = ['id_cliente','id_maquina','descricao_problema','estado_manutencao'];

    public static function getRegistros(){
        $registro=DB::table('registros')
        ->join('clientes', 'clientes.id_cliente' , '=' ,'registros.id_cliente')
        ->join('maquinas', 'maquinas.id_maquina' , '=' ,'registros.id_maquina')
        ->join('setors', 'setors.id_setor' , '=' ,'maquinas.setor_id_setor')
        ->select(
        /*Registros*/'registros.id_registro','registros.id_cliente','registros.id_maquina','registros.descricao_problema','registros.estado_manutencao',
        /*Maquinas*/'maquinas.identificador as identificador','maquinas.gabinete as gabinete',
        /*Setores*/'setors.nome_setor as nomeSetor',
        /*Clientes*/'clientes.nome as nome_cliente'
         )
        ->get();
        return $registro;
    }
}
