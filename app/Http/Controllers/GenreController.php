<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public readonly Genre $genre;

    public function __construct()
    {

        $this->genre = new Genre();
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = $this->genre->all();
        return view('genres', ['genres' => $genres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         // Verificar se o genero já existe
         $existing = $this->genre->where('name', $request->input('name'))->first();

         if ($existing) {
             // Se o email já está registrado
             return redirect()->back()->with('message', 'Gênero já cadastrado');
         }

        // Criar usuário
        $created = $this->genre->create([
            'name' => $request->input('name'),
        ]);

        if ($created) {
            return redirect()->back()->with('message', 'Cadastrado com sucesso');
        }

        return redirect()->back()->with('message', 'Erro no cadastrar');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return view('genre.show', ['genre' => $genre]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('genre.edit', ['genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->genre->where('id', $id)->update(['name'=> $request->input('name')]);

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
        $this->genre->where('id', $id)->delete();

        return redirect()->route('genres.index');
    }
}
