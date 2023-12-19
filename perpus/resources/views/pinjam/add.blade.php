<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku - FTIK</title>
    <link rel="stylesheet" href="{{ url('style.css')}}">
</head>
<body>
@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $errors)
        <li>{{ $errors }}</li>
        @endforeach
    </ul>
</div>
@endif
    <form action="{{url('pinjam/save')}}" method="get">
    @csrf 
        <h2 class="judul">Pinjam Buku</h2>
        <input type="hidden" name="id" value=""/>
        <input type="hidden" name="is_update" value="{{$is_update}}"/>
        <br/><br/>
        Anggota : 
        <select type="text" name="ID_Anggota" width="200px;">
        <option value="" disabled selected>Pilih Anggota</option>
            @foreach ($optpinjam as $key => $value)
                @if (old('ID_Anggota')==$key)
                <option value="{{$key}}"selected>{{$value}}</option>
                @else
                <option value="{{$key}}">{{ $value }}</option>
                @endif
            @endforeach
        </select>
        <br/><br/>
        Buku :
        <select type="text" name="ID_Buku" width="200px;">
        <option value="" disabled selected>Pilih Buku</option>
            @foreach ($optpinjam1 as $key => $value)
            @if (old('ID_Buku')==$key)
                <option value="{{$key}}"selected>{{$value}}</option>
                @else
                <option value="{{$key}}">{{ $value }}</option>
                @endif
            @endforeach
        </select>
        <br><br>Tanggal Pinjam <input type="date" name="Tgl_Pinjam" value="{{old('Tgl_Pinjam')}}">
        <br><br>Tanggal Kembali <input type="date" name="Tgl_Kembali" value="{{old('Tgl_Kembali')}}">
        <br/><br/><input type="submit" name="btn_simpan" value="Simpan"/><input type="reset" value="Batal">
    </form>
    <br/><a href="{{url('pinjam')}}">kembali</a>
</body>
</html>