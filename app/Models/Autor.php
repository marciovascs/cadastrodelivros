<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'autor';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['nome'];
    // protected $hidden = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    /**
     * Método para acessar a view 'view_relatorio_autor'
     */
    public function getDadosGerarRelatorioAutorByView()
    {
        $dados = \DB::table('view_relatorio_autor')
            ->where('autor_id', $this->id)
            ->get();
        return $dados;
    }


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    // vamos fazer com que sempre que os autores sejam buscados, já venham com seus livros
    protected static function booted()
    {
        static::addGlobalScope('livros', function ($query) {
            $query->with('livros');
        });
    }
    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'livro_autor', 'autor_id', 'livro_id');
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
