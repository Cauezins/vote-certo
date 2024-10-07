<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
/**
 * @OA\Info(title="API de Itens", version="1.0")
 */

class AdminController
{

    /**
     * @OA\Post(
     *     path="/api/admin",
     *     summary="Criar um novo item",
     *     tags={"Admin"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="id_coligada", type="int"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="password", type="string"),
     *             @OA\Property(property="cargo", type="int")
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'id_coligada' => 'nullable',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'cargo' => 'required|max:255',
        ]);

        // Criptografar a senha antes de salvar
        $validatedData['password'] = Hash::make($validatedData['password']);

        $item = Admin::create($validatedData);

        return response()->json($item, 201);
    }


    /**
     * @OA\Put(
     *     path="/api/admin/{id}",
     *     summary="Atualiza um administrador existente",
     *     description="Atualiza os dados de um administrador pelo ID.",
     *     operationId="updateAdmin",
     *     tags={"Admin"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID do administrador a ser atualizado",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "password", "cargo"},
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="id_coligada", type="integer", nullable=true, example=1),
     *             @OA\Property(property="email", type="string", example="john.doe@example.com"),
     *             @OA\Property(property="password", type="string", example="password123"),
     *             @OA\Property(property="cargo", type="string", example="Gerente")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Dados do administrador atualizados com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", example="john.doe@example.com"),
     *             @OA\Property(property="cargo", type="string", example="99"),
     *             @OA\Property(property="id_coligada", type="integer", nullable=true, example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Administrador não encontrado",
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
        $item = Admin::find($id);

        if ($item) {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'id_coligada' => 'nullable',
                'email' => 'required|max:255',
                'password' => 'required|max:255',
                'cargo' => 'required|max:255',
            ]);

            $validatedData['password'] = Hash::make($validatedData['password']);

            $item->update($validatedData);

            return response()->json($item, 200);
        } else {
            return response()->json(['message' => 'Item not found'], 404);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/admin/login",
     *     summary="Logar no sistema",
     *     tags={"Admin"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="password", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Login bem-sucedido"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Credenciais inválidas"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="User Not Found"
     *     )
     * )
     */

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = Admin::where('email', $credentials['email'])->first();
        if(isset($user)){
             if ($user && Hash::check($credentials['password'], $user->password)) {
                // A senha está correta
                return response()->json($user, 200);
            } else {
                // A senha está incorreta
                return response()->json(['message' => 'Credenciais inválidas'], 401);
            }
        }else{
            return response()->json(['message' => 'User Not Found'], 400);
        }


    }

    public static function find($id)
    {
        return Admin::find($id);
    }

    /**
     * @OA\Delete(
     *     path="/api/admin/{id}",
     *     summary="Remove um administrador existente",
     *     description="Remove um administrador pelo ID.",
     *     operationId="deleteAdmin",
     *     tags={"Admin"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID do administrador a ser removido",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Administrador removido com sucesso."
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Administrador não encontrado.",
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
        $item = Admin::find($id);

        if ($item) {
            $item->delete();

            return response()->json(['message' => 'Item deleted successfully'], 204);
        } else {
            return response()->json(['message' => 'Item not found'], 404);
        }
    }
}
