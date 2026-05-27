<?php

namespace App\Http\Controllers;

use App\Exports\BooksExport;
use App\Imports\BooksImport;
use App\Models\Book;
use App\Models\Bookshelf;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    public function index()
    {
        $data['books'] = Book::with('bookshelf')->get();
        return view('books.index', $data);
    }

    public function create()
    {
        $data['bookshelves'] = Bookshelf::pluck('name','id');
        return view('books.create', $data);
    }

    // public function store (Request $request){
    //     $validated = [
    //     'title' => 'required|max:255',
    //     'author' => 'required|max:100',
    //     'year' => 'required|digits:4|min:1999|max:'.(date('Y')),
    //     'publisher' => 'required|max:255',
    //     'city'=> 'required|max:255',
    //     'cover' => 'nullable|image', //bisa dikosongkan
    //     'bookshelf_id' => 'required',
    //     ];

    //     //logika pemyimpanan
    //     if($request->hasFile('cover')){
    //         $path = $request->file('cover')->storeAs(
    //             'cover_buku',
    //             'cover_buku'.time() . '.' . $request->file('cover')->extension(),
    //             'public'
    //         );
    //         $validated['cover'] = basename($path);
    //     }

        
        

    //     Book::create($validated);
    //     if($request->save == true){
    //         return redirect()->route('book');
    //     }else{
    //         return redirect()->route('book.create');
    //     }
    // }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:100',
            'year' => 'required|digits:4',
            'publisher' => 'required',
            'city' => 'required',
            'cover' => 'nullable|image',
            'bookshelf_id' => 'required',
        ]);

        if($request->hasFile('cover')){
            $path = $request->file('cover')->storeAs(
                'cover_buku',
                'cover_buku'.time() . '.' . $request->file('cover')->extension(),
                'public'
            );
            $validated['cover'] = basename($path);
        }

        Book::create($validated);

        if($request->save == true){
            return redirect()->route('book');
        }else{
            return redirect()->route('book.create');
        }
    }

    public function edit(string $id){
        $data['book'] = Book::find($id);
        $data['bookshelves'] = Bookshelf::pluck('name', 'id');
        
        return view('books.edit', $data);
    }

    public function update(Request $request, String $id){
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:100',
            'year' => 'required|digits:4',
            'publisher' => 'required',
            'city' => 'required',
            'cover' => 'nullable|image',
            'bookshelf_id' => 'required',
        ]);

        if($request->hasFile('cover')){
            $path = $request->file('cover')->storeAs(
                'cover_buku',
                'cover_buku'.time() . '.' . $request->file('cover')->extension(),
                'public'
            );
            $validated['cover'] = basename($path);
        }

        Book::where('id', $id)->update($validated);

        $notification = array(
            'message' => 'data berhasil di perbarui!',
            'alert-type' => 'success'
        );

        if($request->save == true){
            return redirect()->route('book');
        }else{
            return redirect()->route('book.create');
        }
    }

    public function destroy(string $id){
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('book')->with('success', 'Data berhasil dihapus');
    }

    public function print(){
        $books = Book::all();
        $pdf = pdf::loadView('books.print', ['books' => $books]);
        return $pdf->download('dataBuku.pdf');
    }

    // user maatwebsite\excel
    public function export(){
        return Excel::download(new BooksExport, 'books.xlsx');
    }

    //request untuk mengambil data
    public function import(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
        Excel::import(new BooksImport, $request->file('file'));
        return redirect()->route('book');
    }
}
