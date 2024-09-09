<?php

namespace App\Imports;

use App\Models\Servants;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;

class ServantsImport implements ToModel, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row[3])) {
            return null;
        }

        return new Servants([
            'enrollment' => $row[0],
            'contract' => $row[1],
            'name' => $this->removeAccents($row[2]),
            'email' => $row[3],
            'active' => true
        ]);
    }

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'email';
    }

    private function removeAccents($string) 
    {
        return iconv('UTF-8', 'ASCII//TRANSLIT', $string);
    }
}
