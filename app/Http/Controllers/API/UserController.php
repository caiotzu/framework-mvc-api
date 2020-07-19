<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Model
use App\Http\Requests\UserRequest; // Validações do model
use App\Http\Resources\User as UserResource; // Retorno de 1 dado na API
use App\Http\Resources\UserCollection; // retorno de uma collection na API


class UserController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->model->all(); // Pega todos os usuários cadastrados
        $usersResources = new UserCollection($users); // Formata o retorno para collects
        return response()->json($usersResources, 200); // retorna formatado
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            // Faz a validação e gravação do novo usuário
            $user = new User;
            $user->fill($request->all());
            $user->save();

            // Cria uma instancia do usuário, formatando o retorno da API
            $userResource = new UserResource($user);
            return response()->json($userResource, 201);

        } catch(\Exception $e) {
            return response()->json([
                'title' => 'Erro',
                'msg'   => 'Ocorreu um problema na gravação do usuário!'
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
            $user = $this->model->findOrFail($id); // Pesquisa o usuário pelo ID
            $userResource = new UserResource($user); // Formata os dados de retorno
            return response()->json($userResource, 200); // retorna os dados do usuário formatado

        } catch(\Exception $e) {
            return response()->json([
                'title' => 'Erro',
                'msg'   => 'Ocorreu um problema e não foi possível trazer os dados do usuário!'
            ], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        try {
            $user = $this->model->findOrFail($id); // Pesquisa o usuário pelo ID
            $user->fill($request->all()); // campos para salvar no banco de dados
            $user->save(); // Salva as alterações do usuário
            $userResource = new UserResource($user); // Formata os dados de retorno
            return response()->json($userResource, 200); // retorna os dados formatados 

        } catch(\Exception $e) {
            return response()->json([
                'title' => 'Erro',
                'msg'   => 'Ocorreu um problema e não foi possível salvar as alterações dos dados do usuário!'
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
            $user = $this->model->findOrFail($id); // Pesquisa o usuário pelo ID
            $user->delete(); // Deleta o registro do banco
            return response()->json([], 204); // Retorno code 204 - deu certo a operação.

        } catch(\Exception $e) {
            return response()->json([
                'title' => 'Erro',
                'msg'   => 'Ocorreu um problema e não foi possível excluir o usuário!'
            ], 500);
        }
    }
}
