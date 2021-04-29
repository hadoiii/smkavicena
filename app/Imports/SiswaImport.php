<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Siswa;

class SiswaImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key => $row)
        if($key >= 3){
        $tanggal_lahir = ($row[7] - 25569) * 86400;
        {
            Siswa::create([
                'nisn' => $row[2],
                'nama_depan' => $row[3],
                'nama_belakang' => $row[4],
                'jenis_kelamin' => $row[4],
                'tempat_lahir' => $row[6],
                'tanggal_lahir' => gmdate('Y-m-d', $tanggal_lahir),
                'agama' => $row[8],
                'golongan_darah' => $row[9],
                'alamat' => $row[10],
                'email' => $row[11],
                'no_ponsel' => $row[12],
                'nama_ayah' => $row[13],
                'pekerjaan_ayah' => $row[14],
                'nama_ibu' => $row[15],
                'pekerjaan_ibu' => $row[16],
                'nama_wali' => $row[17],
                'no_darurat' => $row[18],
                'sekolah_asal' => $row[19],
                'no_ijazah_smp' => $row[20]

            ]);
        }
    }
    }
}
