@extends('template')

@section('content')

<form method="POST" action="{{route('bukuupdate')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" class="form-control" name="id" value="{{$data->buku_id}}">

    <div class="form-group">
        <label for="">Kode Buku</label>
        <input type="text" class="form-control" name="kode" value="{{$data->buku_kode}}">
    </div>
    
    <div class="form-group">
        <label for="">Gambar</label><br>
        <input type="text" class="form-control" name="old_img" readonly value="{{$data->buku_img}}">
        <img src="{{asset('/buku/'.$data->buku_img)}}" width="200" class="m-2" alt="Img">
        <input type="file" class="form-control" name="buku_img">
    </div>
    
    <div class="form-group">
        <label for="">Judul Buku</label>
        <input type="text" class="form-control" name="judul" value="{{$data->buku_judul}}">
    </div>
      
    <div class="form-group">
        <label for="">Pengarang</label>
        <input type="text" class="form-control" name="pengarang" value="{{$data->buku_pengarang}}">
    </div>

    <div class="form-group">
      <label for="">Penerbit</label>
      <input type="text" name="penerbit" class="form-control" name="penerbit" value="{{$data->buku_penerbit}}">
    </div>

    <div class="form-group">
      <label for="">Tahun Terbit</label>
      <input type="text" class="form-control" name="tahun" value="{{$data->buku_tahun}}">
    </div>  

    <div class="form-group">
      <label for="">Tarif Pinjam</label>
      <input type="text" class="form-control" name="tarif" value="{{$data->buku_tarif}}">
    </div>             

    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
    
@endsection