<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Api extends BaseController
{
    public function index()
    {
        $serverApi      = "http://localhost/ci4_restapi/public/pegawai/";
        $dataAPI        = file_get_contents($serverApi);
        $data           = json_decode($dataAPI, True);

        $status     = $data['messages'];
        $datanya    = $data['data'];
        $getdata    = [];
        foreach ($datanya as $dt) {
            $getdata[] = [
                'nip' => $dt['nip'],
                'nama' => $dt['nama'],
                'email' => $dt['email'],
            ];
        }
        //output to json format
        header('Content-type: application/json');
        echo json_encode($getdata);
    }
    public function table()
    {
        $serverApi      = "http://localhost/ci4_restapi/public/pegawai/";
        $dataAPI        = file_get_contents($serverApi);
        $data           = json_decode($dataAPI, True);

        $status     = $data['messages'];
        $datanya    = $data['data'];
        $getdata    = [];
        foreach ($datanya as $dt) {
            $getdata[] = [
                'nip' => $dt['nip'],
                'nama' => $dt['nama'],
                'email' => $dt['email'],
            ];
        }
        //output to json format
        header('Content-type: application/json');
        echo json_encode($getdata);
    }

    public function lihat()
    {
        return view('list');
    }
}
