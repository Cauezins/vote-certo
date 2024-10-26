<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Elections;
use App\Models\ElectionUsers;
use App\Models\Users;

class ElectionsController
{
    public static function getElectionsByPermission($idUser, $position)
    {
        $data = "";
        if ($position == 99 || $position == 50) {
            $data = Elections::all();
        } else {
            $data = Elections::leftJoin('election_users', 'elections.id', '=', 'election_users.election_id')->where('election_users.user_id', $idUser)->orWhere('elections.creator_id', $idUser)->get();
        }
        return $data;
    }


    public function showView($view, $idElection = null)
    {
        $id = $_COOKIE['user_id'];
        $user = Users::find($id);  // Busca o usuário pelo ID

        if ($user) {
            if($view == 'elections'){
                $dataElections = self::getElectionsByPermission($user->id,$user->position);
                return view('admin.admin', ['view' => $view, 'user' => $user, 'dataElections' => $dataElections]);
            }else if($view == 'election'){
                $dataElections = self::getElectionsByPermission($user->id,$user->position);
                return view('admin.admin', ['view' => $view, 'user' => $user, 'dataElections' => $dataElections, 'idElection' => $idElection]);
            }

        } else {
            // Caso não encontre o usuário, redireciona ou retorna um erro
            return redirect('/admin/login');
        }
    }

    public function index()
    {
        return Elections::all();
    }

    //tem q ajustar a documentação
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

    public function store(Request $request)
    {
        $validadeData = $request->validate([
            'title' => 'required|max:255',
            'start_date' => 'nullable|max:255',
            'end_date' => 'nullable|max:255',
            'creator_id' => 'required|max:255',
            'category' => 'required|max:255',
            'public_results' => 'required|max:1',
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
