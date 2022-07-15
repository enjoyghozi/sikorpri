<!DOCTYPE html>
<html>
    <head>
    <title>Cetak Unit</title>
    </head>

    <body>
        <div class="form-group">
            <h3 align="center">Cetak Unit</h3>
            <table class="static" align="center" rules="all" border="1px" style="width= 95%;">
                <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Unit</th>
                            <th>Jumlah Anggota</th>
                        </tr>
                </thead>

                @foreach($cetakUnit as $item)
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td align="center">{{ $item->Anggota->count() }}</td>
                    </tr>    
                </tbody>
                @endforeach
            </table>
        </div>


        <script>
            window.print();
            
        </script>
    </body>

</html>
