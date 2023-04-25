<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Petugas Keluar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col s10">
                <div class="card-panel">
                    <h3>Check out Kendaraan</h3>
                        <form action="{{url('data/out', $up->id) }}" method="get">
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
                            <label for="desc">Ruang</label>
                            <div class="input-field">
                                <input type="text" class="form-control" name="ruang" id="ruang" readonly value="{{$up->ruang->ruang}}" required>
                            </div>
                            <label for="desc">Status</label>
                            <div class="input-field">
                                <input type="text" class="form-control" name="status" id="status" readonly value="{{$up->ruang->status}}" required>
                            </div>
                            <label for="desc">biaya</label>
                            <div class="input-field">
                                <input type="text" class="form-control" name="biaya" id="biaya" value="{{ old('biaya', $up->biaya) ?? 5000 }}" required>
                            </div>
                            <label for="desc">menginap</label>
                            <div class="input-field">
                                @if($up->menginap < 1)
                                <input type="text" name="menginap" class="form-control" id="menginap" value="Tidak Menginap" required>
                                 @else
                                <input type="text" name="menginap" class="form-control" id="menginap" value="{{ $up->menginap }}" required>
                                @endif
                            </div>
                            <label for="desc">Tanggal Keluar</label>
                            <div class="input-field">
                                <input type="date" class="form-control" name="tanggal_keluar" id="tanggal_keluar" value="<?php echo date('Y-m-d'); ?>" readonly required>
                            </div>
                            <label for="desc">Jam Keluar</label>
                            <input type="time" class="form-control" name="jam_keluar" id="jam_keluar" value="<?php echo date('H:i:s'); ?>" readonly required>
                           <br>
                          <button class="btn btn-primary">Check Out Kendaraan</button>
                     </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>