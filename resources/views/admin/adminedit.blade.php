@extends('template')

@section('content')

    <form action="{{route('adminupdate')}}" method="POST">
        
        @csrf
        <input type="hidden" name="admin_id" value="{{$edit->admin_id}}">

        <div class="form-group">    
            <label for="">Nama</label>
            <input type="text" class="form-control" id="" name="nama" value="{{$edit->admin_nama}}">
        </div>
        
        <div class="form-group">    
            <label for="">Username</label>
            <input type="text" class="form-control" id="" name="username" value="{{$edit->admin_username}}">
        </div>
        
        <div class="form-group">    
            <label for="">Password</label>
            <input type="password" class="form-control" id="" name="password" value="{{$edit->admin_password}}">
        </div>

        <button type="submit" name="save" class="btn btn-primary">Save</button>

    </form>
    

@endsection
