<?php

namespace App\Http\Controllers;

use App\Models\arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
class arsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

    $tanggalFilter = $request->input('tanggal');
    $arsip = Arsip::with('ruang');
    $rekapitulasi = Arsip::select(DB::raw('DATE(tanggal_masuk) as tanggal'),
    DB::raw('COUNT(*) as jumlah_mobil'), DB::raw('SUM(biaya) as total_biaya'))->groupBy(DB::raw('DATE(tanggal_masuk)'));

    if ($tanggalFilter) {
        $arsip->whereDate('tanggal_masuk', $tanggalFilter);
        $rekapitulasi->whereDate('tanggal_masuk', $tanggalFilter);
    }


    
    // Ubah query menjadi paginate
    $arsip = $arsip->paginate(5);
    $rekapitulasi = $rekapitulasi->paginate(5);

    return view('view_data', compact('arsip', 'rekapitulasi', 'tanggalFilter'));

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
