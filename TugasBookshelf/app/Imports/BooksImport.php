<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BooksImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
        'title' => $row['judul'],
        'author' => $row['penulis'], //semua harus lowercase walaupun ada uppercase di excel nya
        'year' => $row['tahun_terbit'], //jangan ada spasi ganti jadi lowercase
        'publisher' => $row['penerbit'],
        'city' => $row['kota'],
        'bookshelf_id' => 1
        ]);
    }
}
