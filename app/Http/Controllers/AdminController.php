<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;



class AdminController extends Controller
{
  public function create()
  {
    return view('tambah_user');
  }

  public function add_user(request $request)
  {
    $password = bcrypt($request->password);
    DB::table('user')->insert(['username'=>$request->username,
    'password'=>$password,
    'name'=>$request->nama,
    'alamat'=>$request->alamat,
    'no_telp'=>$request->nomor,
    'role'=>$request->role]);
     return redirect('/');

  } 

    public function lihat()
    {
      $data = DB::table('user')->get();
      return view('lihat_user',['data' => $data]);
    }

    public function delete($id)
    {
      DB::table('user')->where('id',$id)->delete();
      return redirect('/');

    }

    public function edit($user) 
    {
      $data = DB::table('user')->where('id',$user)->get();
      return view('edit_user',['data'=>$data]);
    }

   public function edit_user_aksi(Request $request)
   {
    $pass = bcrypt($request->password);
    DB::table('user')->where('username',$request->username)->update(['username'=>$request->username,'password'=>$pass,'name'=>$request->nama,'alamat'=>$request->alamat,'no_telp'=>$request->nomor,'role'=>$request->role]);
    return redirect('/');
   }
}
