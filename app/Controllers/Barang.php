<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Barang extends BaseController
{
    public function index()
    {
        return view('formtampil');
    }
    public function simpanbarang()
    {
        $db = \Config\Database::connect();

        // Ambil data dari form
        $data = [
            // idbrg opsional: ikut disimpan jika ada (non-null & non-empty)
            'kodebrg' => $this->request->getPost('kodebrg'),
            'namabrg'    => $this->request->getPost('namabrg'),
            'hargabrg'   => $this->request->getPost('hargabrg'),
            'jumlahbeli '     => $this->request->getPost('jumlahbeli'),
            'diskon'  => $this->request->getPost('diskon'),
            'total'   => $this->request->getPost('total'),
        ];

        // Simpan ke database
        $simpan = $db->table('barang')->insert($data);

        if ($simpan) {
            echo "<script>
                alert('Data berhasil disimpan!');
                window.location = '/tampilbarang';
            </script>";
        } else {
            $error = $db->error();
            echo "<script>
                alert('Data gagal disimpan! Error: {$error['message']}');
                window.location = '/barang';
            </script>";
        }
    }

    public function tampil()
    {
        $db = \Config\Database::connect();

        // Urutkan berdasarkan id barang
        $builder = $db->table('barang');
        $builder->orderBy('kodebrg', 'ASC');
        $query = $builder->get();

        $data['barang'] = $query->getResultArray();

        // Tampilkan view
        return view('tampilbarang', $data);
    }
}
