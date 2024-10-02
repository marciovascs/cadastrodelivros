<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'livro';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['titulo', 'editora', 'edicao', 'ano_publicacao', 'preco'];
    // protected $hidden = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    // vamos fazer com que sempre que os livros sejam buscados, já venham com seus assuntos
    protected static function booted()
    {
        static::addGlobalScope('assuntos', function ($query) {
            $query->with('assuntos');
        });
    }

    public function assuntos()
    {
        return $this->belongsToMany(Assunto::class, 'livro_assunto', 'livro_id', 'assunto_id');
    }
    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'livro_autor', 'livro_id', 'autor_id');
    }


    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
