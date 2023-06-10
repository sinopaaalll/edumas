<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengaduan</title>
</head>
<body>
    <div class="text-center">
        <h5 align="center">Laporan Pengaduan Masyarakat</h5>
    </div>
    <div class="container">
    <table border="1" align="center" cellpadding="10" cellspacing="0" width="60%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Pengaduan</th>
                    <th>Isi Laporan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($pengaduan as $pengaduan)
                                <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $pengaduan->tgl}}</td>
                                <td>{{ $pengaduan->user->name }}</td>
                                <td> {{ $pengaduan->deskripsi }}</td>
                                <td>{{ $pengaduan->status == '0' ? 'Belum diproses' : ucwords($pengaduan->status) }} </td>
            @endforeach
            </tbody>

        </table>

    </div>
</body>
</html>