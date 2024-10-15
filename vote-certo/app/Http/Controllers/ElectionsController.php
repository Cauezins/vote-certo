<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Elections;

class ElectionsController{
    public function index(){
        return Elections::all();
    }

    /**
     * @OA\Post(
     *     path="/api/coligada",
     *     summary="Criar uma nova Coligada",
     *     tags={"Coligada"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="status", type="int"),
     *             @OA\Property(property="id_resp", type="int")
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
            'status' => 'required|max:255',
            'id_resp' => 'required|max:255',
        ]);

        $item = Elections::create($validadeData);

        return response()->json($item, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/coligada/{id}",
     *     summary="Atualiza uma coligada existente",
     *     description="Atualiza os dados de uma coligada pelo ID.",
     *     tags={"Coligada"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID da coligada a ser atualizado",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "status", "id_resp"},
     *             @OA\Property(property="name", type="string", example="cipa_1234"),
     *             @OA\Property(property="status", type="integer", nullable=false, example=0),
     *             @OA\Property(property="id_resp", type="integer", nullable=false, example=0)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Dados da coligada atualizados com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="status", type="integer", nullable=false, example=0),
     *             @OA\Property(property="id_resp", type="integer", nullable=false, example=0)
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Coligada não encontrado",
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
         $item = Elections::find($id);

         if ($item) {
             $validatedData = $request->validate([
                'name' => 'required|max:255',
                'status' => 'required|max:255',
                'id_resp' => 'required|max:255',
            ]);

             $item->update($validatedData);

             return response()->json($item, 200);
         } else {
             return response()->json(['message' => 'Item not found'], 404);
         }
     }

     /**
     * @OA\Delete(
     *     path="/api/coligada/{id}",
     *     summary="Remove uma Coligada existente",
     *     description="Remove uma Coligada pelo ID.",
     *     tags={"Coligada"},
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
        $item = Elections::find($id);

        if ($item) {
            $item->delete();
            return response()->json(['message' => 'Item deleted successfully'], 204);
        } else {
            return response()->json(['message' => 'Item not found'], 404);
        }
    }

}

