<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengaduan</title>
</head>
<body>
    <div class="text-center">
        <h3 align="center">Laporan Pengaduan Masyarakat</h3>
    </div>
    <div class="container">
    <table border="1" align="center" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Pengadu</th>
                    <th>Isi Laporan</th>
                    <th>Lokasi</th>
                    <th>Kategori</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($pengaduan as $pengaduan)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $pengaduan->tgl}}</td>
                    <td>{{ $pengaduan->user->name }}</td>
                    <td>{{ $pengaduan->deskripsi }}</td>
                    <td>{{ $pengaduan->lokasi }}</td>
                    <td>{{ $pengaduan->kategori->name }}</td>
                    <td>{{ $pengaduan->status }}</td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
</body>
</html>