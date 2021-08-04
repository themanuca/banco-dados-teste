<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;
    protected $table='categorias';
    protected $fillable=['id', 'categoria','idcategoria'];


    
    public function idcat(){
        return $this->hasMany(related:'App\Models\subcategorias', foreignKey:'idsubcategoria');
    }

    // public function sub(){
    //     return $this->belongsToMany('App\Models\subcategorias');
    // }

}
