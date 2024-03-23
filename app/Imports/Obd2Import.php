<?php

namespace App\Imports;

use App\Models\Obd2;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class Obd2Import implements ToModel, WithChunkReading
{

use RemembersChunkOffset;

    public function model(array $row)
    {
        $chunkOffset = $this->getChunkOffset();

        return new Obd2([
            'codigo'        => $row[0],
            'descripcion' => $row[1],
        ]);
    }

    public function chunkSize(): int
    {
        return 100;
    }
}