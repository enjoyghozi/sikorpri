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
                        <th>#</th>
                        <th>Nama Anggota</th>
                        <th>NIP</th>
                        <th>Unit</th>
                        <th>Tanggal & Waktu Penerimaan</th>
                    </tr>
                </thead>

                @foreach($cetakPurna as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_anggota }}</td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->unit }}</td>
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
