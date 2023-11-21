<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function all()
    {
        $mahasiswas = DB::select('SELECT * FROM mahasiswas');
        foreach ($mahasiswas as $mahasiswa) {
            echo "$mahasiswa->nim | $mahasiswa->nama | $mahasiswa->jurusan <br>";
        }
    }

    public function gabung2()
    {
        $mahasiswas = DB::select('SELECT * FROM mahasiswas, nilais WHERE
mahasiswas.id = nilais.mahasiswa_id');
        foreach ($mahasiswas as $mahasiswa) {
            echo "$mahasiswa->nim | $mahasiswa->nama | $mahasiswa->jurusan | ";
            echo "$mahasiswa->sem_1 | $mahasiswa->sem_2 | $mahasiswa->sem_3 <br> ";
        }
    }

    public function gabungJoin3()
    {
        $mahasiswas = DB::select('SELECT * FROM mahasiswas JOIN nilais ON
mahasiswas.id = nilais.mahasiswa_id WHERE nilais.sem_2 > 3');
        foreach ($mahasiswas as $mahasiswa) {
            echo "$mahasiswa->nim | $mahasiswa->nama | $mahasiswa->jurusan | $mahasiswa->sem_1 | $mahasiswa->sem_2 | $mahasiswa->sem_3 <hr> ";
        }
    }

    public function find()
    {
        $mahasiswa = Mahasiswa::find(3);
        echo "$mahasiswa->nim | $mahasiswa->nama | $mahasiswa->jurusan | {$mahasiswa->nilai->sem_1} | {$mahasiswa->nilai->sem_2} | {$mahasiswa->nilai->sem_3}";
    }

    public function has()
    {
        $mahasiswas = Mahasiswa::has('nilai')->get();

        foreach ($mahasiswas as $mahasiswa) {
            echo "$mahasiswa->nim | $mahasiswa->nama | $mahasiswa->jurusan | {$mahasiswa->nilai->sem_1} | {$mahasiswa->nilai->sem_2} | {$mahasiswa->nilai->sem_3} <br>";
        }
    }

    public function whereHas()
    {
        $mahasiswas = Mahasiswa::whereHas("nilai", function ($query) {
            $query->where("sem_1", ">=", 3);
        })->get();

        foreach ($mahasiswas as $mahasiswa) {
            echo "$mahasiswa->nim | $mahasiswa->nama | $mahasiswa->jurusan | {$mahasiswa->nilai->sem_1} | {$mahasiswa->nilai->sem_2} | {$mahasiswa->nilai->sem_3} <br>";
        }
    }

    public function insertCreate()
    {
        $mahasiswa = Mahasiswa::create(
            [
                'nim' => '19021044',
                'nama' => 'Rudi Permana',
                'jurusan' => 'Teknik Informatika',
            ]
        );
        $mahasiswa->nilai()->create([
            'sem_1' => 2.19,
            'sem_2' => 2.68,
            'sem_3' => 3.07,
        ]);
        echo "Penambahan $mahasiswa->nama ke database berhasil";
    }
}
