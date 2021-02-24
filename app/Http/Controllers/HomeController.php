<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $data['buku'] = DB::table('tb_buku')->count();
        $data['pinjam'] = DB::table('tb_pinjam')->count();
        return view('home', $data);
    }
}
