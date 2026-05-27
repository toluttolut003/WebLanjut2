<?php

namespace App\Http\Controllers;

use App\Models\Bookshelf;
use Illuminate\Http\Request;

class BookshelfController extends Controller
{
    public function index(){

    $data['shelfs'] = Bookshelf::all();

    return view('bookshelf.index', $data);
    }

    public function create(){
        return view('bookshelf.create');
    }

    public function store(Request $request){
    
        $validated = $request->validate([
            'code' => 'required|max:10',
            'name' => 'required|max:255'
        ]);

        Bookshelf::create($validated);

        if($request->save == true){
            return redirect()->route('bookshelf');
        } else {
            return redirect()->route('shelf.create');
        }

    }

    public function edit(String $id){
        $data['shelf'] = Bookshelf::find($id);
        return view('bookshelf.edit', $data);
    }

    public function update(Request $request, String $id){
        $validated = $request->validate([
            'code' => 'required|max:10',
            'name' => 'required|max:255'
        ]);

        Bookshelf::where('id', $id)->update($validated);

        $notification = array(
            'message' => 'data berhasil di perbarui!',
            'alert-type' => 'success'
        );

        if($request->save == true){
            return redirect()->route('bookshelf');
        } else {
            return redirect()->route('shelf.create');
        }

    }

    public function destroy(string $id){
        $bookshelf = Bookshelf::find($id);
        $bookshelf->delete();
        return redirect()->route('bookshelf')->with('success', 'Data berhasil di Hapus');
    }




}
