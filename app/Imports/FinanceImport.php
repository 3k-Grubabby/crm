<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class FinanceImport implements WithMultipleSheets
{

    /**
     * @return array
     */
    public function sheets(): array
    {
        return [
            new FirstSheetImport()
        ];
    }
}
