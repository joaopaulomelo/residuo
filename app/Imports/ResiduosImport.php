<?php

namespace App\Imports;

use App\Models\Residuo;
use Maatwebsite\Excel\Concerns\{ToModel, WithHeadingRow, SkipsEmptyRows};

class ResiduosImport implements ToModel, WithHeadingRow,SkipsEmptyRows
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Residuo([
            'nome'     => $row['nome_comum_do_residuo'],
            'tipo'    => $row['tipo_de_residuo'],
            'categoria' => $row['categoria'],
            'tecnologia' => $row['tecnologia_de_tratamento'],
            'classe' => $row['classe'],
            'un_medida' => $row['unidade_de_medida'],
            'peso' => $row['peso'],
        ]);
    }

    public function headingRow(): int
    {
        return 5;
    }
}
