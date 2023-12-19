<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class Pinjam_m extends Model
{
    use HasFactory;

    protected $table = 'pinjam1';
    protected $primaryKey = 'ID_Pinjam';
    public $timestamps = false;

    function get_records($criteria='')
    {
        $result = self::select('pinjam1.*', 'mst_anggota1.Nama AS Nama_anggota', 'mst_buku1.Judul AS Judul_Buku')
        ->join('mst_anggota1', 'pinjam1.ID_Anggota', '=', 'mst_anggota1.ID_Anggota')
        ->join('mst_buku1', 'pinjam1.ID_Buku', '=', 'mst_buku1.ID_Buku')
        ->when($criteria, function ($query, $criteria) {
            return $query->where('pinjam1.ID_Pinjam', $criteria);
        })
        ->get();
        return $result;
    }
    function insert_record($data)
    {
        $result = self::insert($data);
        return $result;
    }
    function update_by_id($data,$id)
    {
        $result = self::where('ID_Pinjam',$id)
                ->update($data);
        return $result;
    }

    function delete_by_id($id)
    {
        $result = self::where('ID_Pinjam',$id)
                ->delete();
        return $result;
    }

}
