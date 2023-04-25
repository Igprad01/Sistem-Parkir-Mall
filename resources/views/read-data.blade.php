@extends('home')

    @section('content-read-data')
    <div class="row">
        <div class="col s12">
            <br/>
            <div class="card-panel white-text blue">
                <h3>Daftar Kendaraan</h3>
                <br/>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Plat Nomor</th>
                            <th>Tanggal Masuk</th>
                            <th>Jam Masuk</th>
                            <th>Ruang</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ptugas as $usr)
                        <tr>
                            <td>{{ $usr->plat_nomor }}</td>
                            <td>{{ date('Y-m-d', strtotime($usr->tanggal_masuk)) }}</td>
                            <td>{{ date('H:i A', strtotime($usr->jam_masuk)) }}</td>
                            <td>{{ $usr->ruang->ruang }}</td>
                            <td>{{ $usr->ruang->status }}</td>
                            <td>
                                <a href="/out/{{$usr->id}}"><button class="btn btn-primary">Checkout</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection