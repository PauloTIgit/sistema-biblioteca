<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    protected $user;

    public readonly User $User;
    public function __construct()
    {
        $this->user = new User();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->user->all();

        return view('users',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        // Verificar se o email já existe
        $existingUser = $this->user->where('email', $request->input('email'))->first();

        if ($existingUser) {
            // Se o email já está registrado
            return redirect()->back()->with('message', 'Error: E-mail já cadastrado');
        }

        // Criar usuário
        $created = $this->user->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        if ($created) {
            return redirect()->back()->with('message', 'Cadastrado com sucesso');
        }

        return redirect()->back()->with('message', 'Erro no cadastrar');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // var_dump($user);
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $updated = $this->user->where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->back()->with('message', 'Editado com sucesso');
        }
        return redirect()->back()->with('message', 'Erro na edição');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->user->where('id', $id)->delete();

        return redirect()->route('users.index');
    }
}
