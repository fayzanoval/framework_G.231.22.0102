<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku - FTIK</title>
    <link rel="stylesheet" href="{{ url('style.css')}}">
</head>
<body>
    <h2 class="judul">Daftar Pinjam Buku</h2>
    <br>
    <a href="{{url('pinjam/add')}}" class="border">Pinjam Buku</a><br/><br/>
    <table border="1">
        <tr>
            <th>No</th>
            <th>ID Anggota</th>
            <th>ID Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Aksi</th>
        </tr>
    @php
        $no=0;
    @endphp
    @foreach($query as $row)
        @php
            $no++;
        @endphp
        <tr>
            <td>{{$no}}</td>
            <td>{{$row['ID_Anggota']}}</td>
            <td>{{$row['ID_Buku']}}</td>
            <td>{{$row['Tgl_Pinjam']}}</td>
            <td>{{$row['Tgl_Kembali']}}</td>
            <td><a href={{ url('pinjam/delete/'.$row['ID_Pinjam']) }} class="border-delete"
                onclick="return confirm('Yakin?')">Delete</a>
            </td>
        </tr>
    @endforeach
    </table>
    <br>
    <br>
    <a href="/perpus" class="border">Home</a>
</body>
</html>