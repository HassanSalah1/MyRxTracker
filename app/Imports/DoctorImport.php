<?php

namespace App\Imports;

use App\Models\Doctor;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class DoctorImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Loop through every two rows at a time
        for ($i = 0; $i < $rows->count(); $i += 2) {
            // Ensure the next row exists to avoid errors
            if (!isset($rows[$i + 1])) {
                continue;
            }

            // Extract names from two consecutive rows
            $nameZh = trim($rows[$i][0] ?? '');  // First row = Chinese name
            $nameEn = trim($rows[$i + 1][0] ?? ''); // Second row = English name

            // Ensure both names are present before inserting
            if (!empty($nameZh) && !empty($nameEn)) {
                Doctor::create([
                    'name_zh' => $nameZh,
                    'name_en' => $nameEn,
                ]);
            }
        }
    }
}
