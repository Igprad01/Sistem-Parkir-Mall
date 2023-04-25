<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>    
        <div class="container">
        <div class="row">
        <h3>edit Data Petugas</h3>
         @foreach ($data as $user)
        <form action="/user/update" method="get">
        @csrf
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
        <button class="btn btn-primary">Edit</button>
         </form>
        @endforeach
         </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>