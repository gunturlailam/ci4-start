<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kamar extends BaseController
{
    public function index()
    {
        return view('formkamar');
    }
    public function simpankamar()
    {
        $db = \Config\Database::connect();

        // Ambil data dari form
        $data = [
            'kodekamar' => $this->request->getPost('kodekamar'),
            'namakamar' => $this->request->getPost('namakamar'),
            'harga' => $this->request->getPost('harga'),
            'tglcekin' => $this->request->getPost('tglcekin'),
            'tglcekout' => $this->request->getPost('tglcekout'),
            'lama' => $this->request->getPost('lama'),
            'total' => $this->request->getPost('total'),
        ];

        // Simpan ke database
        $simpan = $db->table('kamar')->insert($data);

        if ($simpan) {
            echo "<script>
                alert('Data berhasil disimpan!');
                window.location = '/tampilkamar';
            </script>";
        } else {
            $error = $db->error();
            echo "<script>
                alert('Data gagal disimpan! Error: {$error['message']}');
                window.location = '/kamar';
            </script>";
        }
    }

    public function tampil()
    {
        $db = \Config\Database::connect();

        // Urutkan berdasarkan kode kamar
        $builder = $db->table('kamar');
        $builder->orderBy('kodekamar', 'ASC');
        $query = $builder->get();

        $data['kamar'] = $query->getResultArray();

        // Tampilkan view
        return view('tampilkamar', $data);
    }
}
