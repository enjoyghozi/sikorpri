<!DOCTYPE html>
<html>
    <head>
    <title>Cetak Transaksi</title>
    </head>

    <body>
        <div class="form-group">
            <h3 align="center">Cetak Transaksi</h3>
            <table class="static" align="center" rules="all" border="1px" style="width= 95%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Unit</th>
                        <th>Jumlah Anggota</th>
                        <th>Total Pembayaran</th>
                        <th>Tanggal & Waktu Pembayaran</th>
                    </tr>
                </thead>

                @foreach($cetakTaliasih as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_unit }}</td>
                        <td>{{ $item->jumlah_anggota }}</td>
                        <td>Rp {{ number_format($item->total) }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                    @endforeach
            </table>
        </div>
        <script>
            window.print();
            
        </script>
    </body>

</html>
