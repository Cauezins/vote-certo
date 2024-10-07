<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController{
    public function index(){
        return User::all();
    }

    /**
     * @OA\Post(
     *     path="/api/user",
     *     summary="Criar novo usuario",
     *     tags={"User"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="cpf", type="string"),
     *             @OA\Property(property="nascimento", type="string"),
     *             @OA\Property(property="id_coligada", type="int")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Item criado com sucesso"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Erro na requisição"
     *     )
     * )
     */

    public function store(Request $request){
        $validadeData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'cpf' => 'required|max:255',
            'nascimento' => 'required|max:255',
            'id_coligada' => 'required|max:255',
        ]);

        $item = User::create($validadeData);

        return response()->json($item, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/user/{id}",
     *     summary="Atualiza um user existente",
     *     description="Atualiza os dados de uma coligada pelo ID.",
     *     tags={"User"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID do User a ser atualizado",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="cpf", type="string"),
     *             @OA\Property(property="nascimento", type="string"),
     *             @OA\Property(property="id_coligada", type="int")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Dados da coligada atualizados com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="cpf", type="string"),
     *             @OA\Property(property="nascimento", type="string"),
     *             @OA\Property(property="id_coligada", type="int")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User não encontrado",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Item not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Erro de validação",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Erro de validação")
     *         )
     *     )
     * )
     */

     public function update(Request $request, $id)
     {
         $item = User::find($id);

         if ($item) {
             $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'cpf' => 'required|max:255',
                'nascimento' => 'required|max:255',
                'id_coligada' => 'required|max:255',
            ]);

             $item->update($validatedData);

             return response()->json($item, 200);
         } else {
             return response()->json(['message' => 'Item not found'], 404);
         }
     }

     /**
     * @OA\Delete(
     *     path="/api/user/{id}",
     *     summary="Remove uma Coligada existente",
     *     description="Remove uma Coligada pelo ID.",
     *     tags={"User"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID da coligada a ser removido",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Coligada removido com sucesso."
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Coligada não encontrado.",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Administrador não encontrado.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Erro na requisição.",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="ID inválido.")
     *         )
     *     )
     * )
     */

    public function destroy($id)
    {
        $item = User::find($id);

        if ($item) {
            $item->delete();
            return response()->json(['message' => 'Item deleted successfully'], 204);
        } else {
            return response()->json(['message' => 'Item not found'], 404);
        }
    }

}

