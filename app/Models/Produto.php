<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table='produtos';
    protected $fillable=['id', 'nome', 'textoarea','categoria_id','file_path', 'downloads'];

    use HasFactory;
}
