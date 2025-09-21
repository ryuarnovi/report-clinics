<!DOCTYPE html>
<html>
<head>
    <title>Rekap Obat PDF</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #333; padding:6px 8px; }
        th { background:#eee; }
    </style>
</head>
<body>
    <h2>Rekap Obat</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>No Batch</th>
                <th>Exp Date</th>
                <th>Stok Awal</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Sisa</th>
                <th>Laba</th>
            </tr>
        </thead>
        <tbody>
            @foreach($obats as $obat)
            <tr>
                <td>{{ $obat->nama }}</td>
                <td>{{ number_format($obat->harga_beli) }}</td>
                <td>{{ number_format($obat->harga_jual) }}</td>
                <td>{{ $obat->no_batch }}</td>
                <td>{{ $obat->exp_date }}</td>
                <td>{{ $obat->stok_awal }}</td>
                <td>{{ $obat->jumlah_masuk ?? 0 }}</td>
                <td>{{ $obat->jumlah_keluar ?? 0 }}</td>
                <td>{{ $obat->sisa_stok ?? 0 }}</td>
                <td>{{ number_format($obat->laba ?? 0) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>