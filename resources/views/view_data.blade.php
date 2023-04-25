@extends('home')

@section('content-view-data')
    <h1>Data rekapitulasi Parkir Kendaraan</h1>

    <form method="GET" action="{{ route('arsip.show') }}">
        <label for="tanggal">Tanggal:</label>
        <input type="date" class="border-1 rounded-2" id="tanggal" name="tanggal" value="{{ $tanggalFilter }}" />
        <button type="submit" class="btn btn-info bg-primary">Filter</button>
    </form>
    
    <table class="table table-hover m-2">
        <thead>
            <tr>
                <th>No</th>
                <th>Plat Nomor</th>
                <th>Tanggal Masuk</th>
                <th>Jam Masuk</th>
                <th>Ruang</th>
                <th>Status</th>
                <th>Biaya</th>
                <th>Menginap</th>
                <th>Tanggal Keluar</th>
                <th>Jam Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arsip as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data->plat_nomor }}</td>
                <td>{{ $data->tanggal_masuk }}</td>
                <td>{{ $data->jam_masuk }}</td>
                <td>{{ $data->ruang->ruang }}</td>
                <td>{{ $data->status }}</td>
                <td>{{ $data->biaya }}</td>
                <td>{{ $data->menginap }}</td>
                <td>{{ $data->tanggal_keluar }}</td>
                <td>{{ $data->jam_keluar }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="{{ $arsip->previousPageUrl() }}" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="{{ $arsip->nextPageUrl() }}" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
      


    <h2>Rekapitulasi</h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Total Kendaraan</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rekapitulasi as $index => $rekap)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $rekap->tanggal }}</td>
                <td>{{ $rekap->jumlah_mobil }}</td>
                <td>{{ $rekap->total_biaya }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="{{ $rekapitulasi->previousPageUrl() }}" aria-label="Previous">
              Previous
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="{{ $rekapitulasi->nextPageUrl() }}" aria-label="Next">
              Next
            </a>
          </li>
        </ul>
      </nav>
      
@endsection