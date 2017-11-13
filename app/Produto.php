<?php

namespace CRUDSystem;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Produto extends Model
{
    use Searchable;
    protected $fillable = [
        'nome', 'descricao'
    ];

    public function categorias(){
        return $this->belongsToMany('CRUDSystem\Categoria'); // relação n para n
    }

    public function images(){
        return $this->hasMany('CRUDSystem\Image'); // relação 1 para n
    }
}
