@extends('home')

@section('content-add_ptugas')
    <div class="row">
        <div class="col s12">
        <div class="card-panel">
        <h3 class="text-center">Tambah Petugas Parkir</h3>
        <form method="get" action="/add_user">
        {{csrf_field()}}
        <label style="color:black;font-size:100%" for="desc">username</label>
        <div class="input-field">
        <input type="text" class="form-control" name="username" id="username" required> 
        </div>
        <label style="color:black;font-size:100%" for="desc">password</label>
        <div class="input-field">
        <input type="password" class="form-control" name="password" id="password" required> 
        </div>
        <label style="color:black;font-size:100%" for="desc">Nama Lengkap</label>
        <div class="input-field">
        <input type="text" class="form-control" name="nama" id="nama" required> 
        </div>
        <label style="color:black;font-size:100%" for="desc">Alamat</label>
        <div class="input-field">
        <input type="text" class="form-control" name="alamat" id="alamat" required> 
        </div>
        <label style="color:black;font-size:100%" for="desc">Nomor Telp</label>
        <div class="input-field">
        <input type="text" class="form-control" name="nomor" id="nomor" required> 
        </div>
        <label style="color:black;font-size:100%" for="desc">Bagian</label>
        <br>
        <select name="role" id="role" class="form-select">
        <option value="PMasuk">Petugas Masuk</option>
        <option value="PKeluar">Petugas Keluar</option>
        <option value="PRuang">Petugas Ruang</option>
        </select>
        <label style="color:black;font-size:100%" for="desc">MALL</label> 
        <select name="kdmall" id="kdmall" class="form-select">
        <option value="01">Royal Plasa</option>
        <option value="02">Tunjungan Plasa</option>
        <option value="03">Surabaya Plasa</option>
        </select>
        <br>
        <button class="btn btn-outline-primary">Tambah User</button>
        </form>
        </div>
        </div>
        </div>
        @endsection
