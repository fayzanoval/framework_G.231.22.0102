<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku - FTIK</title>
    <link rel="stylesheet" href="{{ url('style.css')}}">
</head>
<body>
    <h2 class="judul">Daftar Buku</h2>
    <br>
    <a href="{{url('buku/add')}}" class="border">Tambah Buku</a><br/><br/>
    <table border="1">
        <tr>
            <th>No</th>
            <th>ID Buku</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Kategori</th>
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
            <td>{{$row['ID_Buku']}}</td>
            <td>{{$row['Judul']}}</td>
            <td>{{$row['Pengarang']}}</td>
            <td>{{$row['Kategori']}}</td>
            <td><a href={{ url('buku/edit/'.$row['ID_Buku']) }} class="border-edit">Edit</a>
                <a href={{ url('buku/delete/'.$row['ID_Buku']) }} class="border-delete"
                onclick="return confirm('Yakin?')">Delete</a>
            </td>
        </tr>
    @endforeach
    </table>
    <br>
    <p>{{$query->links('vendor.pagination.mypage')}}</p>
    <br>
    <a href="/perpus" class="border">Home</a>
</body>
</html>