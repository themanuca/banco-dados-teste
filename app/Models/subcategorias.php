<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategorias extends Model
{
    use HasFactory;
    protected $table='subcategoria';
    protected $fillable=['id','subcategoria','idsubcategoria'];


    public function idsub(){
        return $this->hasOne(related:'App\Models\categorias', foreignKey:'id', localkey:'idsubcategoria');
    }
}
