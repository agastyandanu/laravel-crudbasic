<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PinjamController extends Controller
{
    private function selisihWaktu($FromDate, $ToDate) {
        $multiply = 1;
        if(strtotime($FromDate) > strtotime($ToDate))
        {
          $multiply = -1;
        }
        $FromDate = new \DateTime($FromDate);
        $ToDate   = new \DateTime($ToDate);
        $Interval = $FromDate->diff($ToDate);
        
        if($Interval->h != 0)
        {
          $Difference["jam"] = $Interval->h * $multiply;
        }
        else
        {
          $Difference["jam"] = $Interval->h;
        }
        
        
        if(floor($Interval->d/7) != 0)
        {
          $Difference["minggu"] = floor($Interval->d/7) * $multiply;
        }
        else
        {
          $Difference["minggu"] = floor($Interval->d/7);
        }
        
        
        if($Interval->d != 0)
        {
          $Difference["hari"] = $Interval->d * $multiply;
        }
        else
        {
          $Difference["hari"] = $Interval->d;
        }
        
        if($Interval->m != 0)
        {
          $Difference["bulan"] = $Interval->m * $multiply;
        }
        else
        {
          $Difference["bulan"] = $Interval->m;
        }
        if($Interval->y != 0)
        {
          $Difference["tahun"] = $Interval->y * $multiply;
        }
        else
        {
          $Difference["tahun"] = $Interval->y;
        }
        return $Difference;
      }

    
      public function index()
    {
        $data['pinjam'] = DB::table('tb_pinjam')->join('tb_member', 'tb_pinjam.member_id', 'tb_member.member_id')->join('tb_buku', 'tb_pinjam.buku_id', 'tb_buku.buku_id')->orderBy('pinjam_id', 'DESC')->get();
        // dd($data['pinjam']);
        $data['buku'] = DB::table('tb_buku')->get();
        $data['member'] = DB::table('tb_member')->get();
        return view('pinjam.pinjam', $data);
    }

    public function pinjamsave(Request $req)
    {
        $buku = DB::table('tb_buku')->where('buku_id', $req->buku)->first();
        $pinjam = $req->pinjam;
        $kembali = $req->kembali;
        $lama_pinjam = $this->selisihWaktu($pinjam, $kembali);
        $pinjam_biaya = $lama_pinjam['hari'] * $buku->buku_tarif;
        $save = DB::table('tb_pinjam')->insert([
            'member_id' => $req->member,
            'buku_id' => $req->buku,
            'pinjam_tgl' => $req->pinjam,
            'kembali_tgl' => $req->kembali,
            'pinjam_biaya' => $pinjam_biaya,
        ]);

        if($save == true){
            return back()->with('pesan', 'Data Save Success!');
        } else {
            return back()->with('error', 'Data Save Failed');
        }
    }

    public function pinjamedit($id)
    {
        $data['pinjam'] = DB::table('tb_pinjam')->join('tb_member', 'tb_pinjam.member_id', 'tb_member.member_id')->join('tb_buku', 'tb_pinjam.buku_id', 'tb_buku.buku_id')->where('tb_pinjam.pinjam_id', $id)->first();
        // dd($data['pinjam']);
        $data['buku'] = DB::table('tb_buku')->get();
        $data['member'] = DB::table('tb_member')->get();
        return view('pinjam.pinjamedit', $data);
    }

    public function pinjamupdate(Request $req)
    {       
        $buku = DB::table('tb_buku')->where('buku_id', $req->buku)->first();
        $pinjam = $req->pinjam;
        $kembali = $req->kembali;
        $lama_pinjam = $this->selisihWaktu($pinjam, $kembali);
        $pinjam_biaya = $lama_pinjam['hari'] * $buku->buku_tarif;

        $update = DB::table('tb_pinjam')->where('pinjam_id', $req->pinjam_id)->update([
            'member_id' => $req->member,
            'buku_id' => $req->buku,
            'pinjam_tgl' => $req->pinjam,
            'kembali_tgl' => $req->kembali,
            'pinjam_biaya' => $pinjam_biaya,
        ]);

        if($update == true){
          return redirect('/pinjam')->with('pesan', 'Data Updated!');
        } else {
          return back()->with('error', 'Data Update Failed!');
        }
    }

    public function pinjamdelete($id)
    {
        $delete = DB::table('tb_pinjam')->where('pinjam_id', $id)->delete();

        if($delete == true){
          return back()->with('pesan', 'Data Deleted!');
        } else {
          return back()->with('error', 'Data Delete Failed!');
        }
    }

}
