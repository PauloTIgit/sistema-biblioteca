<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public readonly Book $books;

    public readonly Genre $genres;

    public function __construct()
    {
        $this->books = new Book();
        $this->genres = new Genre();
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = $this->books->all();
        return view('books', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = $this->genres->all();
        return view('book.create', ['genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Verificar se o email já existe
        $existing = $this->books->where('name', $request->input('name'))->first();

        if ($existing) {
            // Se o email já está registrado
            return redirect()->back()->with('message', 'Livro já cadastrado');
        }

        $genreData = $this->genres->where('name', $request->input('genero'))->first();

        if ($genreData) {
            $genre_id = $genreData->id;
        } else {
            // Caso não encontre o gênero, você pode tratar isso, por exemplo:
            return redirect()->back()->with('message', 'Erro no cadastrar');
        }

        // Criar book
        $created = $this->books->create([
            'name' => $request->input('name'),
            'author' => $request->input('author'),
            'status' => $request->input('status'),
            'genre_id' =>  $genre_id,
        ]);



        if ($created) {
            return redirect()->back()->with('message', 'Cadastrado com sucesso');
        }

        return redirect()->back()->with('message', 'Erro no cadastrar');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $genres = $this->genres->all();

        return view('book.show', ['book' => $book, 'genres' => $genres]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $genres = $this->genres->all();
        return view('book.edit', ['book' => $book, 'genres' => $genres]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $genreData = $this->genres->where('name', $request->input('genero'))->first();

        if ($genreData) {
            $genre_id = $genreData->id;
        } else {
            // Caso não encontre o gênero, você pode tratar isso, por exemplo:
            return redirect()->back()->with('message', 'Erro no cadastrar');
        }
        
        $updated = $this->books->where('id', $id)->update([
            'name' => $request->input('name'),
            'author' => $request->input('author'),
            'status' => $request->input('status'),
            'genre_id' =>  $genre_id,
        ]);

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
        $this->books->where('id', $id)->delete();
        return redirect()->route('books.index');
    }
}
