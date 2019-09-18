<?php


namespace App\Constants;


class Attribute
{
    const ID                = 'id';
    const TB                = 'tb';
    const CD                = 'cd';
    const ASC               = 'asc';
    const DESC              = 'desc';
    const DATA              = 'data';
    const LIKE              = 'like';
    const CODE              = 'code';
    const PAGE              = 'page';
    const PATH              = 'path';
    const QUERY             = 'query';
    const ORDER             = 'order';
    const FILTER            = 'filter';
    const CASCADE           = 'cascade';
    const SUCCESS           = 'success';
    const MESSAGE           = 'message';
    const REQUIRED          = 'required';
    /*####### TABELAS   #######################*/
    const TB_PAIS           = 'tb_pais';
    const TB_ESTADO         = 'tb_estado';
    const TB_CIDADE         = 'tb_cidade';
    const TB_PESSOA         = 'tb_pessoa';
    const TB_CONTATO        = 'tb_contato';
    const TB_ENDERECO       = 'tb_endereco';
    const TB_PONTUACAO      = 'tb_pontuacao';
    const TB_CATEGORIA      = 'tb_categoria';
    const TB_ESTADO_CIVIL   = 'tb_estado_civil';
    /*####### RELASCIONAMENTOS ################*/
    const PAIS              = 'pais';
    const ESTADO            = 'estado';
    const CIDADE            = 'cidade';
    const PESSOA            = 'pessoa';
    const CONTATO           = 'contato';
    const ENDERECO          = 'endereco';
    const CATEGORIA         = 'categoria';
    const PONTUACAO         = 'pontuacao';
    const ESTADO_CIVIL      = 'estadoCivil';
    const ESTADO_PAIS       = 'estado.pais';
    const CIDADE_ESTADO_PAIS= 'cidade.estado.pais';
    /*######## CÓDIGOS ########################*/
    const CD_PAIS           = 'cd_pais';
    const CD_ESTADO         = 'cd_estado';
    const CD_CIDADE         = 'cd_cidade';
    const CD_PESSOA         = 'cd_pessoa';
    const CD_CONTATO        = 'cd_contato';
    const CD_ENDERECO       = 'cd_endereco';
    const CD_CATEGORIA      = 'cd_categoria';
    const CD_PONTUACAO      = 'cd_pontuacao';
    const CD_ESTADO_CIVIL   = 'cd_estado_civil';
    /*########  NOMES ##########################*/
    const NO_RUA            = 'no_rua';
    const NO_PAIS           = 'no_pais';
    const NO_NOME           = 'no_nome';
    const NO_CIDADE         = 'no_cidade';
    const NO_BAIRRO         = 'no_bairro';
    const NO_ESTADO         = 'no_estado';
    const NO_CATEGORIA      = 'no_categoria';
    const NO_SOBRENOME      = 'no_sobrenome';
    const NO_CONTINENTE     = 'no_continente';
    const NO_ESTADO_CIVIL   = 'no_estado_civil';
    /*######## DESCRIÇÃO #######################*/
    const DS_CATEGORIA      = 'ds_categoria';
    const DS_PONTUACAO      = 'ds_pontuacao';
    const DS_COMPLEMENTO    = 'ds_complemento';
    const DS_REFERENCIA     = 'ds_referencia ';
    /*######## SIGLA ###########################*/
    const SG_PAIS           = 'sg_pais';
    const SG_ESTADO         = 'sg_estado';
    /*####### NÚMERO ###########################*/
    const NR_DDD            = 'nr_ddd';
    const NR_CEP            = 'nr_cep';
    const NR_NUMERO         = 'nr_numero';
    const NR_TELEFONE       = 'nr_telefone';
    const NR_PONTUACAO      = 'nr_pontuacao';
    /*####### ENDEREÇO ########################*/
    const ED_EMAIL          = 'ed_email';
    /*####### DATAS    ########################*/
    const DT_NASCIMENTO     = 'dt_nascimento';
    /*####### TIPOS ###########################*/
    const IC_SEXO           = 'ic_sexo';
    const IC_CONTATO        = 'ic_contato';
    const IC_ESTADO_CIVIL   = 'ic_estado_civil';
    /*####### IC_CONTATO ######################*/
    const CELULAR           = 'CELULAR';
    const COMERCIAL         = 'COMERCIAL';
    const RESIDENCIAL       = 'RESIDENCIAL';
    const EMAIL             = 'EMAIL';
    /*####### DATA E HORA ################*/
    const TS_CRIADO         = 'ts_criado';
    const TS_REMOVIDO       = 'ts_removido';
    const TS_ATUALIZADO     = 'ts_atualizado';
}
