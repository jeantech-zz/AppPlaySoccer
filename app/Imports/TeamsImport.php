<?php

namespace App\Imports;

use App\Models\Team;
use Maatwebsite\Excel\Concerns\ToModel;

class TeamsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Team([
            'name' => $row[0],
            'country' => $row[1],
            'image' => $row[2]
        ]);
    }
}
