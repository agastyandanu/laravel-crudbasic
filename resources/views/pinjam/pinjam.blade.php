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
                <th>Judul Buku</th>
                <th>Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Biaya Peminjaman</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pinjam as $i => $datapinjam)   
            <tr>
                <td>{{$datapinjam->buku_kode}}</td>
                <td>{{$datapinjam->buku_judul}}</td>
                <td>{{$datapinjam->member_nama}}</td>
                <td>{{$datapinjam->pinjam_tgl}}</td>
                <td>{{$datapinjam->kembali_tgl}}</td>
                <td>{{$datapinjam->pinjam_biaya}}</td>
                <td>
                <a href="{{route('pinjamedit', $datapinjam->pinjam_id)}}" class="btn btn-warning">Edit</a>
                    <a href="{{route('pinjamdelete', $datapinjam->pinjam_id)}}" class="btn btn-danger">Delete</a>
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
          <h5 class="modal-title" id="exampleModalLabel">Input Data Peminjaman</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{route('pinjamsave')}}">
                @csrf
                
                <div class="form-group">
                  <label for="">Judul Buku</label>
                  <select name="buku" class="form-control">
                      @foreach ($buku as $judul)
                        <option value="{{$judul->buku_id}}">{{$judul->buku_judul}}</option>
                      @endforeach
                  </select>
                </div>      
                
                <div class="form-group">
                  <label for="">Peminjam</label>
                  <select name="member" class="form-control">
                      @foreach ($member as $nama)
                        <option value="{{$nama->member_id}}">{{$nama->member_nama}}</option>
                      @endforeach
                  </select>
                </div>     
                
                <div class="form-group">
                  <label for="">Tanggal Pinjam</label>
                  <input type="date" class="form-control" name="pinjam">
                </div>  
                
                <div class="form-group">
                  <label for="">Tanggal Kembali</label>
                  <input type="date" class="form-control" name="kembali">
                </div>
            
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
      </div>
    </div>
  </div>


    
@endsection