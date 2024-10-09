<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editora;

class EditoraController extends Controller
{
    public function getEditorasApi(){
        $editoras = Editora::getEditorasApi();

        echo 'Editoracontroller';
        dd($editoras);
    }
}
