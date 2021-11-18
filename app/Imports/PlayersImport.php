<?php

namespace App\Imports;

use App\Models\Player;
use Maatwebsite\Excel\Concerns\ToModel;

class PlayersImport implements ToModel
{
    public function model(array $row)
    {
        return new Player([
            'name' => $row[0],
            'nationality' => $row[1],
            'age' => $row[2],
            'position' => $row[3],
            'shirt_number' => $row[4],
            'image' => $row[5],
            'team_id' => 1
        ]);
    }
}