<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $data['cars'] = Car::all();
        return view('car.index', $data);
    } //arahin ke view nya disini bukan di web.php, di route cuman nunjukin fungsi apa yg harus di eksekusi sj ketika nge klik
    //nanti route eta nu di tunjuken ka view mun nga klik, jadi lewih ka ngaklik fungsi na lain ka web na langsung

    public function create(){
        return view('car.create');
    }

    

    public function store(Request $request){

        $validated = $request->validate([
            'merk' => 'required|max:255',
            'harga' => 'required',
            'Keluaran' => 'required|digits:4'
        ]);

        Car::create($validated);

        if($request->save == true){
            return redirect()->route('car');
        }else{
            return redirect()->route('form');
        }
    }
}
