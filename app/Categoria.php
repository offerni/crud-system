<?php

namespace CRUDSystem;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Categoria extends Model
{
    use Searchable;
    protected $fillable = [
        'nome', 'descricao', 'img_url'
    ];

    public function produtos(){
        return $this->belongsToMany('CRUDSystem\Produto'); // relação n para n
    }





}
