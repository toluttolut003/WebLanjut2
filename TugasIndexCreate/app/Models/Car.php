<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'merk',
        'harga',
        'Keluaran'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public static function getDataBooks(){
        $books = Car::all();
        $books_filter = [];
        $no = 1;

        for ($i=0; $i < $books->count(); $i++){
            $books_filter[$i]['no'] = $no++;
            $books_filter[$i]['merk'] = $books[$i]->Merk;
            $books_filter[$i]['harga'] = $books[$i]->Harga;
            $books_filter[$i]['Keluaran'] = $books[$i]->Keluaran;
        }
        return $books_filter;
    }

}
