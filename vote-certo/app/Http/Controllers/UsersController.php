<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Users;

/**
 * @OA\Info(title="API de Itens", version="1.0")
 */

class UsersController
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
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="password", type="string"),
     *             @OA\Property(property="position", type="integer"),
     *             @OA\Property(property="img_profile", type="string"),
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
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'position' => 'required|max:255',
            'img_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar apenas se for uma imagem
        ]);

        if ($request->hasFile('img_profile')) {
            $image = $request->file('img_profile');
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $path = $image->storeAs('profile_images', $imageName, 'public'); // Salva no diretório 'public/storage/profile_images'
            $validatedData['img_profile'] =  $path; // Caminho da imagem a ser salvo no banco
        }


        // Criptografar a senha antes de salvar
        $validatedData['password'] = Hash::make($validatedData['password']);

        $item = Users::create($validatedData);

        return response()->json($item, 201);
    }

    //depois comenta

    public function show($id)
    {
        // Busca o usuário no banco de dados pelo ID
        $user = Users::find($id);

        // Verifica se o usuário foi encontrado
        if ($user) {
            // Retorna os dados do usuário (como JSON ou para uma view)
            return response()->json(['user' => $user]);
        } else {
            // Caso não encontre o usuário, pode retornar um erro
            return response()->json(['error' => 'User not found'], 404);
        }
    }


    public function showAdminView($view)
    {
        $id = $_COOKIE['user_id'];
        $user = Users::find($id);  // Busca o usuário pelo ID

        if ($user) {
            // Passa o objeto User diretamente para a view
            if ($view == "users") {
                $data = Users::all();
                return view('admin.admin', ['view' => $view, 'user' => $user, 'data' => $data]);
            } else {
                return view('admin.admin', ['view' => $view, 'user' => $user]);
            }
        } else {
            // Caso não encontre o usuário, redireciona ou retorna um erro
            return redirect('/admin/login');
        }
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
     *             required={"name", "email", "password", "position", "img_profile"},
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", example="john.doe@example.com"),
     *             @OA\Property(property="password", type="string", example="password123"),
     *             @OA\Property(property="position", type="integer", example="99"),
     *             @OA\Property(property="img_profile", type="string", nullable=true, example="profile/caue.img"),
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
        $item = Users::find($id);

        if ($item) {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'password' => 'required|max:255',
                'position' => 'required|max:255',
                'img_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar apenas se for uma imagem
            ]);

            if ($request->hasFile('img_profile')) {
                $image = $request->file('img_profile');
                $imageName = time() . "." . $image->getClientOriginalExtension();
                $path = $image->storeAs('profile_images', $imageName, 'public'); // Salva no diretório 'public/storage/profile_images'
                $validatedData['img_profile'] = '/storage/' . $path; // Caminho da imagem a ser salvo no banco
            }

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

        $user = Users::where('email', $credentials['email'])->first();
        if (isset($user)) {
            if ($user && Hash::check($credentials['password'], $user->password)) {
                // A senha está correta
                return response()->json($user, 200);
            } else {
                // A senha está incorreta
                return response()->json(['message' => 'Credenciais inválidas'], 401);
            }
        } else {
            return response()->json(['message' => 'User Not Found'], 400);
        }
    }

    public static function find($id)
    {
        return Users::find($id);
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
        $item = Users::find($id);

        if ($item) {
            // Verifica se a imagem existe e exclui
            if ($item->img_profile != 'profile_images/image_default.jpg') {
                $filePath = storage_path('app/public/' . $item->img_profile); // Constrói o caminho completo

                // Verifica se o arquivo existe usando PHP
                if (file_exists($filePath)) {
                    unlink($filePath); // Exclui a imagem
                } else {
                    return response()->json(['message' => 'Arquivo não encontrado'], 404);
                }
            }

            $item->delete();

            return response()->json(['message' => 'Item deleted successfully'], 204);
        } else {
            return response()->json(['message' => 'Item not found'], 404);
        }
    }
}
