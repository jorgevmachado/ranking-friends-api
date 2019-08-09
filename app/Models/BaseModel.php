<?php

namespace App\Models;

use App\Constants\Attribute;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

 abstract class BaseModel extends Model
{
     /**
      * O Nome da coluna "created at".
      *
      * @var string
      */
     const CREATED_AT = Attribute::TS_CRIADO;

     /**
      * O Nome da coluna "updated at".
      *
      * @var string
      */
     const UPDATED_AT = Attribute::TS_ATUALIZADO;

     /**
      * O Nome da coluna "deleted at".
      *
      * @var string
      */
     const DELETED_AT = Attribute::TS_REMOVIDO;

     /**
      * Campo para verificação do uso de appends
      *
      * @var bool
      */
     public static $withoutAppends = false;

     /**
      * Verifica se o campo $withoutAppends está habilitado.
      *
      * @return array
      */
     protected function getArrayableAppends()
     {
         if(self::$withoutAppends){
             return [];
         }
         return parent::getArrayableAppends();
     }

     public function __construct()
     {
         self::changeKeyName();
         parent::__construct();
     }

     /**
      * Altera a primaryKey
      */
     protected function changeKeyName()
     {
         if ($this->primaryKey === Attribute::ID) {
             $this->primaryKey = str_replace(Attribute::TB, Attribute::CD, $this->table);
         }
     }

     /**
      * Retorna a primaryKey
      *
      * @return string
      */
     public function getKeyName()
     {
         return $this->primaryKey;
     }

     /**
      * Retorna uma busca por id
      *
      * @param null $id
      * @return mixed
      */
     public function find($id = null)
     {
         return parent::find($id);
     }

     /**
      * @param $data
      * @return $this
      */
     public function populate($data)
     {
         foreach ($data as $key => $value) {
             $this->{$key} = $value;
         }
         return $this;
     }


     /**
      * Verifica se é uma PrimaryKey
      *
      * @return bool
      */
     public function isValuePK()
     {
         return (is_null($this->{$this->primaryKey}) === false);
     }

     /**
      *
      * @param Builder $query
      * @return Builder
      */
     public function scopeExcept($query, $id)
     {
         return $query->where($this->getKeyName(), '!=', $id);
     }

     /**
      * @param Builder $query
      * @param $param
      * @return Builder
      */
     public function scopeLike($query, $param)
     {
         collect($param)->each(function ($value, $key) use ($query) {
             $query->where(\DB::raw("CAST($key AS TEXT)"), Attribute::LIKE, "%{$value}%");
         });
         return $query;
     }

     /**
      * @param Builder $query
      * @param $param
      * @return Builder
      */
     public function scopeOrder($query, $param)
     {
         collect($param)->each(function ($value, $key) use ($query) {
             $query->orderBy($key, $value);
         });
         return $query;
     }

     /**
      * @param Builder $query
      * @return Builder
      */
     public function scopeLatest($query)
     {
         $query->orderBy(Attribute::TS_CRIADO, Attribute::DESC);
         return $query;
     }

     /**
      * @param Builder $query
      * @param $param
      * @return Builder
      */
     public function scopeAutoQuery($query, $param)
     {
         collect($param)->each(function ($value, $key) use ($query) {
             if (!empty(trim($value)) || $value === "0") {
                 if (strpos($key, 'ds_') === 0 || strpos($key, 'no_') === 0) {
                     $query->where(
                         DB::raw("UPPER($key)"),
                         Attribute::LIKE,
                         DB::raw("UPPER('%{$value}%')")
                     );
                 } else {
                     $query->where($key, $value);
                 }
             }
         });
         return $query;
     }
}
