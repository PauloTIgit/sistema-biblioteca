<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{

    public readonly Loan $loan;
    public readonly Book $books;
    public readonly Genre $genres;
    public readonly User $users;
    public function __construct()
    {
        $this->loan = new Loan();
        $this->books = new Book();
        $this->genres = new Genre();
        $this->users = new User();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $loans = $this->loan->all();
        $loans = Loan::with(['user', 'book'])->get();
        $books = $this->books->all();
        $genres = $this->genres->all();
        $users = $this->users->all();

        return view('loans',[
            'loans' => $loans,
            'books' => $books,
            'genres' => $genres,
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $loans = $this->loan->all();
        $books = $this->books->all();
        $genres = $this->genres->all();
        $users = $this->users->all();

        return view('loan.create', [
            'loans' => $loans,
            'books' => $books,
            'genres' => $genres,
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Criar locação
        $created = $this->loan->create([
            'user_id' => $request->input('user_id'),
            'book_id' => $request->input('book_id'),
            'due_date' => $request->input('due_date'),
            'status' => $request->input('status'),
        ]);

        $updatedBook = $this->books->where('id', $request->input('book_id'))->update([
            'status' => 'emprestado'
        ]);

        if ($updatedBook) {
            if ($created) {
                return redirect()->back()->with('message', 'Cadastrado com sucesso');
            }
    
            return redirect()->back()->with('message', 'Erro no cadastrar');
        }
        return redirect()->back()->with('message', 'Erro no cadastrar');


        
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        $books = $this->books->all();
        $genres = $this->genres->all();
        $users = $this->users->all();

        return view('loan.show', [
            'loan' => $loan,
            'books' => $books,
            'genres' => $genres,
            'users' => $users,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        $books = $this->books->all();
        $genres = $this->genres->all();
        $users = $this->users->all();

        return view('loan.edit', [
            'loan' => $loan,
            'books' => $books,
            'genres' => $genres,
            'users' => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if($request->input('status') == 'devolvido'){
            $updatedBook = $this->books->where('id', $request->input('book_id'))->update([
                'status' => 'disponivel'
            ]);
        }else{
            $updatedBook = $this->books->where('id', $request->input('book_id'))->update([
                'status' => 'emprestado'
            ]);
        }

        if ($updatedBook){
            $updated = $this->loan->where('id', $id)->update([
                'user_id' => $request->input('user_id'),
                'book_id' => $request->input('book_id'),
                'due_date' => $request->input('due_date'),
                'status' => $request->input('status'),
            ]);
    
            if ($updated) {
                return redirect()->back()->with('message', 'Editado com sucesso');
            }
            return redirect()->back()->with('message', 'Erro na edição');
        }
        return redirect()->back()->with('message', 'Erro na edição');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $dadoLoan = $this->loan->where('id', $id)->first();

        if($dadoLoan){
            $updatedBook = $this->books->where('id', $dadoLoan->book_id )->update([
                'status' => 'disponivel'
            ]);

            if ($updatedBook){
                $this->loan->where('id', $id)->delete();
                return redirect()->route('loans.index');
            }
        }
        
        return redirect()->back()->with('message', 'Erro na exclusão'); 

    }
}
