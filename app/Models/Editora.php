<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    use HasFactory;

    // Se não estiver usando uma tabela, você pode desabilitar a tabela padrão
    protected $table = null; // ou use um nome diferente se desejar

    // Se não estiver usando timestamps
    public $timestamps = false;


}
