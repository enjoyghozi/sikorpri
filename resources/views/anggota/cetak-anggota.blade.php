<!DOCTYPE html>
<html>
    <head>
    <title>Cetak Anggota</title>
    </head>

    <body>
        <div class="form-group">
            <h3 align="center">Cetak Anggota</h3>
            <table class="static" align="center" rules="all" border="1px" style="width= 95%;">
                <thead>
                        <tr>
                            <th>Unit</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Golongan</th>
                            <th>Keterangan</th>
                        </tr>
                </thead>

                @foreach($cetakanggota as $item)
                <tbody>
                    <tr>
                        <td>{{$item->daftar_unit->nama}}</td>
                        <td>{{ $item->nama}}</td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->golongan->golongan}}</td>
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
