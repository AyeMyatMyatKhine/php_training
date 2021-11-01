<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'name' => $row['name'],
            'region' => $row['region'],
            'city' => $row['city'],
            'dateOfJoin' => $row['dateOfJoin'],
            'department' => $row['department'],
        ]);
    }
}
