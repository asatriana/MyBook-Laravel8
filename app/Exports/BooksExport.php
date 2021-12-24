<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class BooksExport implements FromQuery
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
     //   return Book::all();
        // return new Collection([
            // [1, 2, 3],
            // [4, 5, 6]
        // ]);
    // }

    // protected $invoices;

    // public function __construct(array $invoices)
    // {
        // $this->invoices = $invoices;
    // }

    // public function array(): array
    // {
        // return $this->invoices;
    // }

    use Exportable;

    public function query()
    {
        return Book::query();
    }
}


