<?php

namespace App\Exports;

use App\Models\Obd2;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class Obd2Export implements FromView, ShouldAutoSize
{
    use Exportable;

   public function view(): View
    {
        return view('app.obd2.listado_excel', [
            'error_obd' => Obd2::select('id','codigo','descripcion')
                        ->orderBy('id')->get()
        ]);
    }


}
