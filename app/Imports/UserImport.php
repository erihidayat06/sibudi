<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'kecamatan' => $row[0],
            'desa' => $row[1],
            'id_desa' => $row[2],
            'password' => '$2y$12$TLxm4WqU3erybw/tJ5ENfuqTIPoHkNGFsJPi45bUEPsmZkeXfijxu'
        ]);
    }
}
