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
                        <th>Id Pembayaran</th>
                        <th>Unit</th>
                        <th>Jenis Pembayaran</th>
                        <th>Total Pembayaran</th>
                        <th>Tanggal Pembayaran</th>
                    </tr>
                </thead>

                @foreach($cetakPertanggal as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_unit }}</td>
                        <td>{{ $item->jenis_pembayaran }}</td>
                        <td>Rp {{ number_format($item->total_pembayaran) }}</td>
                        <td>{{ $item->tanggal_pembayaran }}</td>
                    </tr>
                    @endforeach
            </table>
        </div>
        <script>
            window.print();
            
        </script>
    </body>

</html>
