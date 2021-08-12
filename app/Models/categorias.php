<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;
class categorias extends Model
{
    use HasFactory;
    protected $table='categorias';
    protected $fillable=['id', 'categoria','idcategoria'];


    

    public function dados(){

        return $this->hasMany(Produto::class, foreignKey:'categoria_id');

    }
}
