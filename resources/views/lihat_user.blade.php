@extends('home')

@section('content-lihat-ptugas')
<body>
    <div class="row">
        <div class="col s12">
            <br/>
            <div class="card-panel whte-text blue">
                <h3>Daftar Petugas</h3>
            </br>
            <table class="table table-hover">
                <thead>
                    <tr>
                      <th scope="col">username</th>
                      <th scope="col">Nama</th>
                      <th scope="col">No_Telp</th>
                      <th scope="col">bagian</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                @foreach ($data as $usr)
                    <tr>
                        <td>
                            {{$usr->username}}
                        </td>
                        <td>
                            {{$usr->name}}
                        </td>
                        <td>
                            {{$usr->no_telp}}
                        </td>
                        <td>
                            {{$usr->role}}
                        </td>
                    <td>
                        <a href="/user/delete/{{$usr->id}}" onclick="return confirm('yakin ingin menghapusnya?');"><button class="btn btn-danger">Hapus</button></a>
                        <a href="/edit/{{$usr->id}}"><button class="btn btn-primary">Edit</button></a>
                    </td>
                @endforeach
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection