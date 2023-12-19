<?php

namespace App\Http\Controllers;

use App\Models\Anggota_m;
use App\Models\Buku_m;
use Illuminate\Http\Request;
use App\Models\Pinjam_m;

class PinjamController extends Controller
{
    var $data;

    /*public function __construct()
    {
        $this->data['opt_pinjam']=[
            ''=>'-Pilih salah satu-',
            '1'=>'1',
            '2'=>'2',
            '3'=>'3',
            '4'=>'4'
        ];
        $this->data['opt_pinjam1']=[
            ''=>'-Pilih salah satu-',
            '1'=>'1',
            '2'=>'2',
            '3'=>'3',
            '4'=>'4'
        ];
    }*/

    public function index(Pinjam_m $pinjam)
    {
        $data = [
            //'query' => $buku->get_records(),
            'query' => $pinjam->paginate(5),
            // 'optkategori' => $this->data['opt_kategori']
        ];
        return view('pinjam.list',$data);
    }

    public function add_new(Pinjam_m $pinjam)
    {
        /*$data = [
            'query' => $pinjam->get_records(),
            'optpinjam' => $this->data['opt_pinjam'],
            'optpinjam1' => $this->data['opt_pinjam1']
        ];*/
        
            $data = [
                'query' => $pinjam->get_records(),
                'is_update' =>0,
                'optpinjam' => Anggota_m::pluck('Nama', 'ID_Anggota'),
                'optpinjam1' => Buku_m::pluck('Judul', 'ID_Buku')
            ];
        
        return view('pinjam.add', $data);
    }

    public function save(pinjam_m $pinjam, Request $request)
    {
        $validated = $request->validate([
            'ID_Anggota'=>'required',
            'ID_Buku'=>'required',
            'Tgl_Pinjam'=>'required', 
            'Tgl_Kembali'=>'required',
        ]);

        $data['ID_Anggota']      =$request->input('ID_Anggota');
        $data['ID_Buku']         =$request->input('ID_Buku');
        $data['Tgl_Pinjam']      =$request->input('Tgl_Pinjam');
        $data['Tgl_Kembali']     =$request->input('Tgl_Kembali');
        $is_update = $request->input('is_update');

        if($is_update==0)
        {
            if($pinjam->insert_record($data));
                return redirect('/pinjam');
        }
        else
        {
            $id=$request->input('id');
            if($pinjam->update_by_id($data,$id));
                return redirect('/pinjam');
        }
    }

    public function edit($id, Pinjam_m $pinjam)
    {
        $data = [
            'query'=>$pinjam->get_records($id)->first(),
            'is_update'=>1,
            // 'optkategori'=>$this->data['opt_kategori']
        ];
        return view('pinjam.edit',$data);
    }
    public function delete($id,Pinjam_m $pinjam)
    {
        if($pinjam->delete_by_id($id))
            return redirect('pinjam');
    }

}
