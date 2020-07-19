<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet; // Model
use App\Http\Requests\PetRequest; // Validações do model
use App\Http\Resources\Pet as PetResource; // Retorno de 1 dado na API
use App\Http\Resources\PetCollection; // retorno de uma collection na API


class PetController extends Controller
{
    protected $model;

    public function __construct(Pet $pet)
    {
        $this->model = $pet;   
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = $this->model->all(); // Pega todos os pets cadastrados
        $petsResource = new PetCollection($pets); // Formata o retorno para collects
        return response()->json($petsResource, 200); // retorna formatado
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PetRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PetRequest $request)
    {
        try {
            // Faz a validação e gravação do novo pet
            $pet = new Pet;
            $pet->fill($request->all());
            $pet->save();

            // Cria uma instancia do pet, formatando o retorno da API
            $petResource = new PetResource($pet);
            return response()->json($petResource, 201);

        } catch(\Exception $e) {
            return response()->json([
                'title' => 'Erro',
                'msg'   => 'Ocorreu um problema na gravação do pet!'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $pet = $this->model->findOrFail($id); // Pesquisa o pet pelo ID
            $petResource = new PetResource($pet); // Formata os dados de retorno
            return response()->json($petResource, 200); // retorna os dados do pet formatado

        } catch(\Exception $e) {
            return response()->json([
                'title' => 'Erro',
                'msg'   => 'Ocorreu um problema e não foi possível trazer os dados do pet!'
            ], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $pet = $this->model->findOrFail($id); // Pesquisa o pet pelo ID
            $pet->fill($request->all()); // campos para salvar no banco de dados
            $pet->save(); // Salva as alterações do pet
            $petResource = new PetResource($pet); // Formata os dados de retorno
            return response()->json($petResource, 200); // retorna os dados formatados 
        } catch(\Exception $e) {
            return response()->json([
                'title' => 'Erro',
                'msg'   => 'Ocorreu um problema e não foi possível salvar as alterações dos dados do pet!'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $pet = $this->model->findOrFail($id); // Pesquisa o pet pelo ID
            $pet->delete(); // Deleta o registro do banco
            return response()->json([], 204); // Retorno code 204 - deu certo a operação.

        } catch(\Exception $e) {
            return response()->json([
                'title' => 'Erro',
                'msg'   => 'Ocorreu um problema e não foi possível excluir o pet!'
            ], 500);
        }
    }
}
