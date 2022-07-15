<!DOCTYPE html>
<html>
    <head>
    <title>Cetak Anggota Per Unit</title>
    </head>

    <body>
        <div class="form-group">
            <h3 align="center">Cetak Anggota Per Unit</h3>
            <table class="static" align="center" rules="all" border="1px" style="width= 95%;">
                <thead>
                        <tr>
                            <th>#</th>
                            <th>Unit</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Golongan</th>
                            <th>Keterangan (SubUnit)</th>
                        </tr>
                </thead>

                @foreach ($cetakAnggota as $item)
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $item->daftar_unit->nama }}</td>
                        <td>{{ $item->nama}}</td>
                        <td>{{ $item->nip }}</td>
                        <td align="center">{{ $item->golongan->golongan}}</td>
                        <td>{{ $item->keterangan }}</td>
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
