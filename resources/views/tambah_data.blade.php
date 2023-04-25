@extends('home')

@section('content-add-data')
    <div class="row">
        <div class="col s12">
            <div class="card-panel">
                <h3>tambah data Kendaraan</h3>
                <form action="/tambah_data" method="get">
                {{csrf_field()}}
                <label style="color:black;font-size:100%" for="desc">plat nomor</label>
                <div class="input-field">
                    <input type="text" class="form-control" name="plat_nomor" id="plat_nomor" style="text-transform: uppercase;">
                </div>
                @if(session('error'))
                <div style="color:red">
                    {{ session('error') }}
                </div>
                @endif
                <label style="color:black;font-size:100%" for="desc">tanggal masuk</label>
                <div class="input-field">
                    <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" value="<?php echo date('Y-m-d'); ?>" readonly required>
                </div>
                <label style="color:black;font-size:100%" for="desc">Jam Masuk</label>
                <div class="input-field">
                    <input type="time" class="form-control" name="jam_masuk" id="jam_masuk" value="<?php echo date('H:i:s'); ?>" readonly required>
                </div>
                <button class="btn btn-primary mt-5">tambah Kendaraan</button>
                </form>
            </div>
        </div>
    </div>
@endsection