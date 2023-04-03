<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ModelPegawai;

class Pegawai extends ResourceController
{
    protected $pegawaiModel;
    protected $modelName = 'App\Models\ModelPegawai';
    protected $format = 'json';
    public function __construct()
    {
        $this->pegawaiModel = new ModelPegawai();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index($id = null)
    {
        $cekDulu = $this->pegawaiModel->pdn_cekData();
        if ($cekDulu > 0) {
            $pegawai = $this->pegawaiModel->pdn_view($id);
            if ($pegawai == null) {
                // Jika tidak ditemukan data dengan id yang diberikan
                $response = [
                    'messages' => 'error',
                    'data' =>  'Data tidak ditemukan',
                ];
                return $this->respond($response, 200);
            }
            $data = [];
            foreach ($pegawai as $pDn) {
                $data[] = [
                    'nip'  => $pDn->pegawai_nip,
                    'nama'  => $pDn->pegawai_nama,
                    'email'  => $pDn->pegawai_email,
                ];
            }
            // Berhasil dikelola
            $response = [
                'messages' => 'success',
                'data' =>  $data,
            ];
        } else {
            //Ketika database kosong
            $response = [
                'messages' => 'error',
                'data' =>  [
                    'messsage' => 'Tidak ada data',
                ],
            ];
        }
        return $this->respond($response, 200);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
