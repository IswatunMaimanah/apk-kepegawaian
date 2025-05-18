<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Bulanan Pegawai - {{ $periode ?? 'Periode Tidak Diketahui' }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
        hr { margin: 30px 0; }
    </style>
</head>
<body>

<h2>Laporan Bulanan Pegawai - {{ $periode ?? 'Periode Tidak Diketahui' }}</h2>

@foreach($pegawai as $p)
    <h3>{{ $p->nama_pegawai }} ({{ $p->jabatan }})</h3>
    <p>
        <strong>Email:</strong> {{ $p->email }} |
        <strong>No HP:</strong> {{ $p->no_hp }} |
        <strong>TTL:</strong> {{ $p->ttl }}
    </p>

    <h4>Absensi - {{ $p->nama_pegawai }}</h4>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($p->absensi as $a)
            <tr>
                <td>{{ \Carbon\Carbon::parse($a->tanggal)->format('d-m-Y') }}</td>
                <td>{{ $a->jam_masuk ? \Carbon\Carbon::parse($a->jam_masuk)->format('H:i') : '-' }}</td>
                <td>{{ $a->jam_keluar ? \Carbon\Carbon::parse($a->jam_keluar)->format('H:i') : '-' }}</td>
                <td>{{ $a->status }}</td>
                <td>{{ $a->keterangan ?? '-' }}</td>
            </tr>
            @empty
            <tr><td colspan="5">Tidak ada data absensi</td></tr>
            @endforelse
        </tbody>
    </table>

    <h4>Penggajian - {{ $p->nama_pegawai }}</h4>
    <table>
        <thead>
            <tr>
                <th>Periode</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan</th>
                <th>Potongan</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($p->penggajian as $g)
            <tr>
                <td>{{ \Carbon\Carbon::createFromFormat('Y-m', $g->periode)->format('F Y') }}</td>
                <td>Rp{{ number_format($g->gaji_pokok,0,',','.') }}</td>
                <td>Rp{{ number_format($g->tunjangan,0,',','.') }}</td>
                <td>Rp{{ number_format($g->potongan,0,',','.') }}</td>
                <td>Rp{{ number_format($g->total_gaji,0,',','.') }}</td>
                <td>{{ ucfirst($g->status) }}</td>
            </tr>
            @empty
            <tr><td colspan="6">Tidak ada data gaji</td></tr>
            @endforelse
        </tbody>
    </table>

    <h4>Penilaian Kerja - {{ $p->nama_pegawai }}</h4>
    <table>
        <thead>
            <tr>
                <th>Disiplin</th>
                <th>Produktivitas</th>
                <th>Kerjasama</th>
                <th>Total</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($p->penilaianKerja as $n)
            <tr>
                <td>{{ $n->nilai_disiplin }}</td>
                <td>{{ $n->nilai_produktivitas }}</td>
                <td>{{ $n->nilai_kerjasama }}</td>
                <td>{{ $n->nilai_total }}</td>
                <td>{{ $n->catatan ?? '-' }}</td>
            </tr>
            @empty
            <tr><td colspan="5">Tidak ada data penilaian</td></tr>
            @endforelse
        </tbody>
    </table>

    <hr>
@endforeach

<p style="text-align: right;">Dicetak: {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}</p>

</body>
</html>
