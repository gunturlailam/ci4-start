<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Sppd extends BaseController
{
    public function index()
    {
        echo view('formsppd');
    }

    public function simpan()
    {
        $db  = \Config\Database::connect();
        $data = [
            'kode' => $this->request->getPost('kode'),
            'agenda' => $this->request->getPost('agenda'),
            'btransportasi' => $this->request->getPost('transportasi'),
            'bpenginapan' => $this->request->getPost('penginapan'),
            'bpokok' => $this->request->getPost('pokok'),
            'total' => $this->request->getPost('total'),
        ];

        $simpan = $db->table('tabelsppd')->insert($data);
        if ($simpan) {
            echo "<script>
        alert('data berhasil disimpan');
        window.location='/sppd/tampil';
    </script>";
        } else {
            print_r($db->error());
            echo "<script>
        alert('data gagal disimpan');
        window.location='/sppd';
    </script>";
        }
    }

    public function tampil()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tabelsppd');
        $query = $builder->get();
        $data['sppdok'] = $query->getResultArray();
        return view('tampilsppd', $data);
    }
}
