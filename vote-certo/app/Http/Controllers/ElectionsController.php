<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use App\Models\Elections;
use App\Models\ElectionSetting;
use App\Models\ElectionUsers;
use App\Models\Users;

class ElectionsController
{
    public static function getElectionsByPermission($idUser, $position)
    {
        $data = "";
        if ($position == 99 || $position == 50) {
            $data = Elections::select(
                'elections.id',
                'elections.created_id',
                'elections.title',
                'elections.start_date',
                'elections.end_date',
                'elections.created_at as election_created_at',
                'elections.updated_at as election_updated_at',
                'election_setting.election_id as setting_election_id',
                'election_setting.public_results',
                'election_setting.category',
                'election_setting.send_email',
                'election_setting.start_automatic',
                'election_setting.start'
            )
            ->leftJoin('election_setting', 'elections.id', '=', 'election_setting.election_id')->get();
        } else {
            $data = Elections::leftJoin('election_setting', 'elections.id', '=', 'election_setting.election_id')->where('elections.creator_id', $idUser)->get();
        }
        return $data;
    }

    public static function getElectionByPermission($idUser, $position, $idElection)
    {
        $data = "";
        if ($position == 99 || $position == 50) {
            $data = Elections::select(
                'elections.id',
                'elections.created_id',
                'elections.title',
                'elections.start_date',
                'elections.end_date',
                'elections.created_at as election_created_at',
                'elections.updated_at as election_updated_at',
                'election_setting.election_id as setting_election_id',
                'election_setting.public_results',
                'election_setting.category',
                'election_setting.send_email',
                'election_setting.start_automatic',
                'election_setting.start'
            )->leftJoin('election_setting', 'elections.id', '=', 'election_setting.election_id')->where('elections.id', $idElection)->first();
        } else {
            $data = Elections::leftJoin('election_settings', 'elections.id', '=', 'election_settings.election_id')->where('elections.id', $idElection)->where('elections.creator_id', $idUser)->first();
        }
        return $data;
    }


    public function showView($view, $idElection = null)
    {
        try {
            $token = $_COOKIE['user_token'];
            $user = JWTAuth::setToken($token)->authenticate();

            if ($user) {
                $dataElections = self::getElectionsByPermission($user->id, $user->position);
                if ($view == 'elections') {
                    return view('admin.admin', ['view' => $view, 'user' => $user, 'dataElections' => $dataElections]);
                } else if ($view == 'election') {
                    try {
                        $idElection = Crypt::decryptString($idElection);
                        $dataElection = self::getElectionByPermission($user->id, $user->position, $idElection);
                    } catch (Exception $e) {
                        $dataElection = 'error';
                    }

                    return view('admin.elections.election', ['view' => $view, 'user' => $user, 'dataElections' => $dataElections, 'dataElection' => $dataElection ]);
                }else if($view == 'election-setting'){
                    try {
                        $idElection = Crypt::decryptString($idElection);
                        $dataElection = self::getElectionByPermission($user->id, $user->position, $idElection);
                    } catch (Exception $e) {
                        echo "caiu aq";
                        $dataElection = 'error';
                    }

                    return view('admin.elections.election-setting', ['view' => $view, 'user' => $user, 'dataElections' => $dataElections, 'dataElection' => $dataElection ]);
                }
            } else {
                // Caso não encontre o usuário, redireciona ou retorna um erro
                return redirect('/admin/login');
            }
        } catch (Exception $e) {
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
            'created_id' => 'required|max:255',
            'category' => 'required|max:255',
            'public_results' => 'required|max:1',
        ]);

        $item = Elections::create(['title' => $validadeData['title'], 'start_date' => $validadeData['start_date'], 'end_date' => $validadeData['end_date'], 'created_id' => $validadeData['created_id']]);
        if($item){
            $itemSetting = ElectionSetting::create(['category' => $validadeData['category'], 'public_results' => $validadeData['public_results'], 'election_id' => $item->id]);
        }

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
