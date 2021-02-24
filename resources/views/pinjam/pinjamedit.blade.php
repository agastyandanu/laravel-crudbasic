@extends('template')

@section('content')

    <form method="POST" action="{{route('pinjamupdate')}}">
        @csrf

        <input type="hidden" name="pinjam_id" value="{{$pinjam->pinjam_id}}">
        <div class="form-group">
        <label for="">Judul Buku</label>
        <select name="buku" id="buku" class="form-control">
            @foreach ($buku as $judul)
                <option value="{{$judul->buku_id}}">{{$judul->buku_judul}}</option>
                <script type="text/javascript">
                    document.getElementById('buku').value = {{$pinjam->buku_id}}
                </script> 
            @endforeach
        </select>
        </div>      
        
        <div class="form-group">
        <label for="">Peminjam</label>
        <select name="member"  id="member" class="form-control">
            @foreach ($member as $nama)
                <option value="{{$nama->member_id}}">{{$nama->member_nama}}</option>
                <script type="text/javascript">
                    document.getElementById('member').value = {{$pinjam->member_id}}
                </script>                
            @endforeach
        </select>
        </div>     
        
        <div class="form-group">
        <label for="">Tanggal Pinjam</label>
        <input type="date" class="form-control" name="pinjam" value="{{$pinjam->pinjam_tgl}}">
        </div>  
        
        <div class="form-group">
        <label for="">Tanggal Kembali</label>
        <input type="date" class="form-control" name="kembali" value="{{$pinjam->kembali_tgl}}">
        </div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    

@endsection
