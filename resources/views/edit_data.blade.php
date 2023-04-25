<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Petugas Ruang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col s10">
                <div class="card-panel">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <h3>edit Ruang Kendaraan</h3>
                        <form action="{{url('data/update', $up->id) }}" method="get">
                            <label for="decs">Plat Nomor</label>
                            <div class="input-field">
                                <input type="text" class="form-control" name="plat_nomor" id="plat_nomor" readonly value="{{$up->plat_nomor}}" required>
                            </div>
                            <label for="desc">tanggal masuk</label>
                            <div class="input-field">
                                <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" readonly value="{{$up->tanggal_masuk}}" required>
                            </div>
                            <label for="desc">Jam Masuk</label>
                            <div class="input-field">
                                <input type="time" class="form-control" name="jam_masuk" id="jam_masuk" readonly value="{{$up->jam_masuk}}" required>
                            </div>
                            <label for="ruang">Ruang</label>
                            <select name="id_ruang" class="form-select" id="id_ruang">
                                @foreach ($ruangs as $ruang)
                                    @if (($ruang->status != 'BOOKED' && $up->id_ruang == $ruang->id) || ($ruang->status != 'BOOKED' && $up->id_ruang != $ruang->id) || ($ruang->status == 'BOOKED' && $up->id_ruang == $ruang->id && $up->status == 'BOOKED'))
                                        <option value="{{ $ruang->id }}" {{ $up->id_ruang == $ruang->id ? 'selected' : '' }}>
                                            {{ $ruang->ruang }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                           <br>
                           <button class="btn btn-primary">Edit</button>
                     </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>