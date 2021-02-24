@extends('template')

@section('content')

<a href="" class="btn btn-primary"> Input Data </a>
    
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nama Administrator</th>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $dataadmin)

            <tr>
                <td>{{$dataadmin->admin_nama}}</td>
                <td>{{$dataadmin->admin_username}}</td>
                <td>{{$dataadmin->admin_password}}</td>
                <td>
                    <a href="{{route('adminedit', $dataadmin->admin_id)}}" class="btn btn-warning">Edit</a>
                    <a href="{{route('admindelete', $dataadmin->admin_id)}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>

@endsection