@extends('template')

@section('content')

        
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Input Data
    </button>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Kode Buku</th>
                <th>Gambar</th>
                <th>Judul Buku</th>
                <th>Pengarang Buku</th>
                <th>Penerbit Buku</th>
                <th>Tahun Terbit</th>
                <th>Tarif Pinjam</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $databuku)
            <tr>
                <td>{{$databuku->buku_kode}}</td>
            <td><img src="{{asset('/buku/'.$databuku->buku_img)}}" width="100" alt="Img"></td>
                <td>{{$databuku->buku_judul}}</td>
                <td>{{$databuku->buku_pengarang}}</td>
                <td>{{$databuku->buku_penerbit}}</td>
                <td>{{$databuku->buku_tahun}}</td>
                <td>{{$databuku->buku_tarif}}</td>
                <td>
                    <a href="{{route('bukuedit', $databuku->buku_id)}}" class="btn btn-warning">Edit</a>
                    <a href="{{route('bukudelete', $databuku->buku_id)}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Input Data Buku</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{route('bukusave')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="">Kode Buku</label>
                  <input type="text" class="form-control" name="kode">
                </div>
                
                <div class="form-group">
                    <label for="">Gambar Buku</label>
                    <input type="file" class="form-control" name="buku_img">
                </div>
                
                <div class="form-group">
                    <label for="">Judul Buku</label>
                    <input type="text" class="form-control" name="judul">
                </div>
                  
                <div class="form-group">
                    <label for="">Pengarang</label>
                    <input type="text" class="form-control" name="pengarang">
                </div>

                <div class="form-group">
                  <label for="">Penerbit</label>
                  <input type="text" name="penerbit" class="form-control" name="penerbit">
                </div>

                <div class="form-group">
                  <label for="">Tahun Terbit</label>
                  <input type="text" class="form-control" name="tahun">
                </div>     

                <div class="form-group">
                  <label for="">Tarif Pinjam</label>
                  <input type="text" class="form-control" name="tarif">
                </div>          
            
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
      </div>
    </div>
  </div>


    
@endsection