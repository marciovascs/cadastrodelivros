<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LivroRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

use App\Models\Assunto;
use App\Models\Livro;

use App\Services\LivroService;

use App\Http\Requests\LivroRequest as StoreRequest;
use App\Http\Requests\LivroRequest as UpdateRequest;

/**
 * Class LivroCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LivroCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    // para tratar o update e o store
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { update as traitUpdate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {

        CRUD::setModel(\App\Models\Livro::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/livro');
        CRUD::setEntityNameStrings('livro', 'livros');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(LivroRequest::class);

        // Definir campos automaticamente a partir do banco de dados
        CRUD::setFromDb();

        // Adicionar campo para selecionar vários assuntos - select_multiple
        CRUD::addField([
            'label'     => 'Assuntos',
            'type'      => 'select_multiple',
            'name'      => 'assuntos', // nome do relacionamento na Model Livro
            'entity'    => 'assuntos', // método de relacionamento na Model Livro
            'attribute' => 'descricao', // o atributo da Model Assunto que será exibido no select
            'model'     => "App\Models\Assunto", // Model relacionada
            'pivot'     => true, // se for uma relação muitos-para-muitos
        ]);

        // Adicionar campo para selecionar vários autores - select_multiple
        CRUD::addField([
            'label'     => 'Autores',
            'type'      => 'select_multiple',
            'name'      => 'autores', // nome do relacionamento na Model Livro
            'entity'    => 'autores', // método de relacionamento na Model Livro
            'attribute' => 'nome', // o atributo da Model Autor que será exibido no select
            'model'     => "App\Models\Autor", // Model relacionada
            'pivot'     => true, // se for uma relação muitos-para-muitos
        ]);

        // vamos recriar o campo preco, já que precisaremos tratá-lo com javascript
        CRUD::addField([
            'label' => 'Preço',
            'name'  => 'preco', // nome do campo no banco de dados
            'type'  => 'text', // Altere para 'text' para evitar problemas de formatação
            'attributes' => [
                'step' => '0.01', // permite valores decimais
                'min' => '0', // mínimo permitido
                'id' => 'preco',
                'oninput' => 'mascaraMoeda(this)', // Chama a função ao digitar
                'placeholder' => 'R$ 0,00' // Placeholder para o campo
            ],
        ]);



    }


    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        // vamos deixar seguir o create
        $this->setupCreateOperation();
    }

    public function store(StoreRequest $request)
    {
        try {
            /**
             * Vamos chamar o serviço para criar o livro,
             * assim evitaremos poluir o Controller
             */
            $objLivroService = new LivroService();
            $objLivroService->criarLivro($request->validated());

            \Alert::success('Livro salvo com sucesso!')->flash();
            return redirect(backpack_url('/livro'));

        } catch (\Exception $e) {
            // Log da exceção
            \Log::error('Erro ao salvar o livro: ' . $e->getMessage());

            // Mensagem de erro para o usuário
            \Alert::error('Ocorreu um erro ao salvar o livro: ' . $e->getMessage())->flash();
            return redirect()->back()->withInput();
        }
    }



}
