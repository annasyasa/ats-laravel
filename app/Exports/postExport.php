<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class postExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Post::all();
    }

    public function headings(): array{
        return [
            "No",
            "Nama",
            "Nis",
            "Absen",
            "Tanggal",
        ];
    }

    public function map($Post):array
    {
        return [
            $Post->id,
            $Post->name,
            $Post->nis,
            $Post->absen,
            \Carbon\Carbon::parse($Post->created_at)->format('d F Y'),
        ];
    }
}
