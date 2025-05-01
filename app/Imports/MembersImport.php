<?php

namespace App\Imports;

use App\Models\Members;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MembersImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2; // Começa da segunda linha
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        dump($row);
//        return new Members([
//            'nome' => $row['nome'],
//            'endereco' => $row['endereco'],
//            'bairro' => $row['bairro'],
//            'telefone' => $row['telefone'],
//            'email' => $row['email'],
//            'status' => $row['status'],
//            'encontro' => '1',
//            'sexo' => 'M',
//            'tipo' => '1',
//            'entidade_id' => Auth::user()->entidade_id,
//            'user_id' => Auth::user()->id
//        ]);
    }
}
