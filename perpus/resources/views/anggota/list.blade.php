<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota - FTIK</title>
    <link rel="stylesheet" href="{{ url('style.css')}}">
</head>
<body>
    <h2 class="judul">Daftar Anggota</h2>
    <br>
    <a href="{{url('anggota/add')}}" class="border">Tambah Anggota</a><br/><br/>
    <table border="1">
        <tr>
            <th>No</th>
            <th>ID Anggota</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Progdi</th>
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
            <td>{{$row['NIM']}}</td>
            <td>{{$row['Nama']}}</td>
            <td>{{$row['Progdi']}}</td>
            <td><a href={{ url('anggota/edit/'.$row['ID_Anggota']) }} class="border-edit">Edit</a>
                <a href={{ url('anggota/delete/'.$row['ID_Anggota']) }} class="border-delete"
                onclick="return confirm('Yakin?')">Delete</a>
            </td>
        </tr>
    @endforeach
    </table>
    <br>
    <p>{{$query->links('vendor.pagination.mypage')}}</p>
    <br>
    <a href="{{url('/perpus')}}" class="border">Home</a>
</body>
</html>