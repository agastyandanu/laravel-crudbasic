<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class BukuController extends Controller
{
    public function index()
    {
        $data = DB::table('tb_buku')->orderBy('buku_id', 'desc')->get();
        return view('buku.buku', compact('data'));
    }

    public function bukusave(Request $req)
    {
        $filename = $req->buku_img->getClientOriginalName();
        $req->file('buku_img')->move('buku', $req->buku_img->getClientOriginalName());

        $save = DB::table('tb_buku')->insert([
            'buku_kode' => $req->kode,
            'buku_judul' => $req->judul,
            'buku_pengarang' => $req->pengarang,
            'buku_penerbit' => $req->penerbit,
            'buku_tahun' => $req->tahun,
            'buku_tarif' => $req->tarif,
            'buku_img' => $filename,
        ]);

        if($save == true){
            return redirect('/book')->with('pesan', 'Data Saved!');
        } else {
            return back()->with('error', 'Data Save Failed!');
        }
    }

    public function bukuedit($id)
    {
        $data = DB::table('tb_buku')->where('buku_id', $id)->first();
        return view('buku.bukuedit', compact('data'));
    }

    public function bukuupdate(Request $req)
    {
        if(!empty($req->buku_img)){
            File::delete('buku/'.$req->old_img);
            $filename = $req->buku_img->getClientOriginalName();
            $req->file('buku_img')->move('buku', $req->buku_img->getClientOriginalName());
            $update = DB::table('tb_buku')->where('buku_id', $req->id)->update([
                'buku_kode' => $req->kode,
                'buku_judul' => $req->judul,
                'buku_pengarang' => $req->pengarang,
                'buku_penerbit' => $req->penerbit,
                'buku_tahun' => $req->tahun,
                'buku_tarif' => $req->tarif,
                'buku_img' => $filename,
            ]);
        } else {
            $update = DB::table('tb_buku')->where('buku_id', $req->id)->update([
                'buku_kode' => $req->kode,
                'buku_judul' => $req->judul,
                'buku_pengarang' => $req->pengarang,
                'buku_penerbit' => $req->penerbit,
                'buku_tahun' => $req->tahun,
                'buku_tarif' => $req->tarif,
            ]);
        }

//         $update = DB::table('tb_buku')->where('buku_id', $req->id)->update([
//             'buku_kode' => $req->kode,
//             'buku_judul' => $req->judul,
//             'buku_pengarang' => $req->pengarang,
//             'buku_penerbit' => $req->penerbit,
//             'buku_tahun' => $req->tahun,
//             'buku_tarif' => $req->tarif,
//             'buku_img' => $filename,
//         ]);
        
        if($update == true){
            return redirect('/book')->with('pesan', 'Data Updated!');
        } else {
            return back()->with('error', 'Data Update Failed!');
        }
    }

    public function bukudelete($id)
    {        
        $data = DB::table('tb_buku')->where('buku_id', $id)->first();
            File::delete('buku/'.$data->buku_img);

        $delete = DB::table('tb_buku')->where('buku_id', $id)->delete();

        if($delete == true){
            return back()->with('pesan', 'Data Deleted!');
        } else {
            return back()->with('error', 'Data Delete Failed!');
        }
    }

}
