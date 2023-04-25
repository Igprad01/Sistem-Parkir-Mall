<?php

namespace App\Http\Controllers;

use App\Models\arsip;
use App\Models\ruang;
use App\Models\ptugasmasuk;
use Illuminate\Http\Request;
use \DateTime;

class ptugasmasukcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('lihat_data');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambah_data');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $plat_nomor = strtoupper($request->plat_nomor);
    
      
        $is_exist = ptugasmasuk::where('plat_nomor', $plat_nomor)->exists();
     
        if ($is_exist) {
            return redirect('/add')->with('error', 'Plat nomor sudah ada sebelumnya!');
        }
    

        ptugasmasuk::create([
            'plat_nomor' => $plat_nomor,
            'tanggal_masuk' => $request->tanggal_masuk,
            'jam_masuk' => $request->jam_masuk,
            'id_ruang' => 1
        ]);
    
        return redirect('/lihatdata');
    }
    
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $ptugas = ptugasmasuk::with('ruang')->get();
        $totalKendaraan = $ptugas->count();
        return view('lihat_data', compact('ptugas'));
    }

    
    
    public function pkeluar() 
    {
        $ptugas = ptugasmasuk::with('ruang')->get();
        return view('read-data', compact('ptugas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $up = ptugasmasuk::with('ruang')->findOrFail($id);
        $ruangs = Ruang::all();
        return view('edit_data', compact('up','ruangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $up = ptugasmasuk::with('ruang')->findOrFail($id);
        if ($up->ruang->id_ruang !== 1) {
            $request->merge(['status' => 'BOOKED']);
        }

        if ($request->id_ruang == '' || $request->id_ruang == 'default' || $request->id_ruang == '1') {
            return back()->with('error', 'data tidak bisa disimpan, karena ketentuannya tidak data status tidak boleh default');
        }

        $ruang = ruang::findOrFail($request->id_ruang);
        $ruang->status = $request->status;
        $ruang->save();

        $up->update($request->all());
        return redirect('/lihatdata');
    }


    
    public function out(string $id)
    {
        $up = ptugasmasuk::with('ruang')->findOrFail($id);
        $ruangs = Ruang::all();
        return view('keluar_data', compact('up', 'ruangs'));
    }

    public function getout(Request $request, string $id)
    {
        $up = Ptugasmasuk::with('ruang')->findOrFail($id);
        $ruangs = Ruang::all();
        
        if ($up->ruang->status == 'DEFAULT') {
            return redirect()->back()->with('error', 'Tidak dapat mengedit data pada ruang DEFAULT');
        }
        
        if ($request->isMethod('get')) {
            $request->validate([
                'tanggal_keluar' => 'required|date_format:Y-m-d',
                'jam_keluar' => 'required|date_format:H:i:s'
            ]);
        
            $datetime1 = new \DateTime($up->tanggal_masuk . ' ' . $up->jam_masuk);
            $datetime2 = new \DateTime($request->tanggal_keluar . ' ' . $request->jam_keluar);
            $interval = $datetime1->diff($datetime2);
        
            $biaya = 5000;
            $menginap = 'Tidak Menginap';
        
            if ($interval->days > 0) {
                $biaya *= 10;
                $menginap = 'Menginap';
            }
        
            $arsip = new arsip([
                'plat_nomor' => $up->plat_nomor,
                'tanggal_masuk' => $up->tanggal_masuk,
                'jam_masuk' => $up->jam_masuk,
                'id_ruang' => $up->id_ruang,
                'status' => $up->status,
                'biaya' => $biaya,
                'menginap' => $menginap,
                'tanggal_keluar' => $request->tanggal_keluar,
                'jam_keluar' => $request->jam_keluar,

            ]);
            $ruang = ruang::find($up->id_ruang);
            $status = $ruang->status;
            
            $arsip->status = $status;

            $arsip->status = 'Kendaraan Sudah Keluar';

            $arsip->save();

        

            $up->ruang->update([
                'status' => 'NOT BOOKED'
            ]);        
        
            $up->delete();
        
            return redirect('/readout')->with('success', 'Data berhasil diupdate dan diarsipkan');
        }
        
        return view('/readout', compact('ptugasmasuk', 'ruangs'));
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
