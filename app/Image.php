<?php

namespace CRUDSystem;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Image extends Model
{
    use Searchable;
    protected $fillable = [
        'url'
    ];

    public function produtos(){
        return $this->belongsTo('CRUDSystem\Produto'); // relação 1 para n (inverso)
    }
}